<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * App\Models\ExceptionError
 *
 * @property string $id
 * @property string|null $message
 * @property string $code
 * @property string $file
 * @property int $line
 * @property mixed $trace
 * @property bool $is_solve 是否解决 0为解决 1已解决
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ExceptionError newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ExceptionError newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ExceptionError query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ExceptionError whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ExceptionError whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ExceptionError whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ExceptionError whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ExceptionError whereIsSolve($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ExceptionError whereLine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ExceptionError whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ExceptionError whereTrace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ExceptionError whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ExceptionError extends Model
{
    /**
     * 指示模型主键是否递增
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * 自动递增ID的“类型”。
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = [
        'message', 'code', 'file', 'line', 'trace', 'is_solve'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'line' => 'integer',
        'is_solve' => 'boolean',
    ];

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        ExceptionError::creating(function ($model) {
            $model->setId();
        });
    }

    /**
     * 设置ID
     */
    public function setId()
    {
        $this->attributes['id'] = Str::orderedUuid();
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    /**
     * Json转数组
     * @param $value
     * @return mixed
     */
    public function getTraceAttribute($value)
    {
        return \GuzzleHttp\json_decode($value, true);
    }

    /**
     * 数字转Json
     * @param $value
     */
    public function setTraceAttribute($value)
    {
        $this->attributes['trace'] = \GuzzleHttp\json_encode($value);
    }

    /**
     * 获取列表
     *
     * @param array $validated
     * @return array
     */
    public static function getList(array $validated): array
    {
        $where = [];
        if ($validated['is_solve'] !== null) {
            $where[] = ['is_solve', '=', $validated['is_solve']];
        }

        $model = ExceptionError::where($where)
            ->when($validated['id'] ?? null, function ($query) use ($validated) {
                return $query->where('id', 'like', '%' . $validated['id'] . '%');
            })
            ->when($validated['message'] ?? null, function ($query) use ($validated) {
                return $query->where('message', 'like', '%' . $validated['message'] . '%');
            })
            ->when($validated['start_at'] ?? null, function ($query) use ($validated) {
                return $query->whereBetween('created_at', [$validated['start_at'], $validated['end_at']]);
            });


        $total = $model->count('id');

        $logs = $model->select(['id', 'message', 'code', 'file', 'line', 'trace', 'is_solve', 'created_at', 'updated_at'])
            ->orderBy($validated['sort'] ?? 'updated_at', $validated['order'] === 'ascending' ? 'asc' : 'desc')
            ->offset(($validated['offset'] - 1) * $validated['limit'])
            ->limit($validated['limit'])
            ->get();


        return [
            'logs' => $logs,
            'total' => $total
        ];
    }

    /**
     * 修正错误信息
     */
    public function solve()
    {
        $this->is_solve = 1;
        $this->save();
        activity()
            ->useLog('exception')
            ->performedOn($this)
            ->causedBy(Auth::guard('admin')->user())
            ->log('The :subject.id exception amended by :causer.name');
    }
}
