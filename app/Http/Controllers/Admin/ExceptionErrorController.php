<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExceptionError\AmendedRequest;
use App\Http\Requests\Admin\ExceptionError\GetListRequest;
use App\Http\Response\ApiCode;
use App\Models\ExceptionError;
use Illuminate\Http\Request;
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
    public function logs(GetListRequest $request)
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
    public function amended(AmendedRequest $request)
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
}
