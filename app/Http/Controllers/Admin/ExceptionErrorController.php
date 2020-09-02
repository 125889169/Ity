<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExceptionError\AmendedRequest;
use App\Http\Requests\Admin\ExceptionError\FileRequest;
use App\Http\Requests\Admin\ExceptionError\GetListRequest;
use App\Http\Response\ApiCode;
use App\Models\ExceptionError;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Symfony\Component\HttpFoundation\Response;

class ExceptionErrorController extends Controller
{
    /**
     * 获取列表
     *
     * @param GetListRequest $request
     * @return Response
     */
    public function logs(GetListRequest $request): Response
    {
        $validated = $request->validated();
        return ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
            ->withHttpCode(ApiCode::HTTP_OK)
            ->withData(ExceptionError::getList($validated))
            ->withMessage(__('message.common.search.success'))
            ->build();
    }

    /**
     * 修复信息
     *
     * @param AmendedRequest $request
     * @return Response
     */
    public function amended(AmendedRequest $request): Response
    {
        $validated = $request->validated();
        $exception = ExceptionError::find($validated['id']);
        $exception->solve();
        return ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
            ->withHttpCode(ApiCode::HTTP_OK)
            ->withData($exception)
            ->withMessage(__('message.common.update.success'))
            ->build();
    }

    /**
     * 获取文件列表
     *
     * @return Response
     */
    public function files(): Response
    {
        $disk = Storage::disk('logs');
        $files = $disk->files();
        $key = array_search('.gitignore', $files);
        array_splice($files, $key, 1);
        return ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
            ->withHttpCode(ApiCode::HTTP_OK)
            ->withData([
                'files' => $files
            ])
            ->withMessage(__('message.common.search.success'))
            ->build();
    }

    /**
     * 获取文件信息
     *
     * @param FileRequest $request
     * @return Response
     */
    public function file(FileRequest $request): Response
    {
        try {
            $validated = $request->validated();
            $contents = Storage::disk('logs')->get($validated['file']);
            return ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
                ->withHttpCode(ApiCode::HTTP_OK)
                ->withData([
                    'file' => $contents
                ])
                ->withMessage(__('message.common.search.success'))
                ->build();
        } catch (FileNotFoundException $exception) {
            return ResponseBuilder::asError(ApiCode::HTTP_BAD_REQUEST)
                ->withHttpCode(ApiCode::HTTP_BAD_REQUEST)
                ->withMessage($exception->getPrevious()->getMessage())
                ->build();
        }
    }
}
