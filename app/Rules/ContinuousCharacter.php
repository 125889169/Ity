<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * 不能出现连续的字符
 *
 * Class ContinuousCharacter
 * @package App\Rules
 */
class ContinuousCharacter implements Rule
{

    /**
     * @var string
     */
    private $str;

    /**
     * Create a new rule instance.
     *
     * @param string $str
     */
    public function __construct(string $str = '\/')
    {
        $this->str = $str;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            return !preg_match("/{$this->str}{2}/", $value);
        } catch (\ErrorException $exception) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.continuous_character', ['values' => $this->str]);
    }
}
