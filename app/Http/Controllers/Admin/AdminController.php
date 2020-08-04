<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\CreateRequest;
use App\Http\Requests\Admin\Admin\GetListRequest;
use App\Http\Requests\Admin\Admin\SyncPermissionsRequest;
use App\Http\Requests\Admin\Admin\UpdateRequest;
use App\Http\Requests\Admin\Admin\UpdateSelfRequest;
use App\Http\Response\ApiCode;
use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Http\Request;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * 管理员列表
     *
     * @param GetListRequest $request
     * @return Response
     */
    public function admins(GetListRequest $request)
    {
        $validated = $request->validated();
        return ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
            ->withHttpCode(ApiCode::HTTP_OK)
            ->withData(Admin::getList($validated))
            ->withMessage(__('message.common.search.success'))
            ->build();
    }

    /**
     * 管理员详情
     *
     * @param Request $request
     * @return Response
     */
    public function admin(Request $request)
    {
        $id = $request->post('id', 0);
        $admin = Admin::find($id);
        if ($admin) {
            $admin->roles;
            $roleIds = [];
            foreach ($admin->roles as $role) {
                $roleIds[] = $role->id;
            }
            $admin->roleIds = $roleIds;
            $admin->permissions;
            $permissionIds = [];
            foreach ($admin->permissions as $permission) {
                $permissionIds[] = $permission->id;
            }
            $admin->permissionIds = $permissionIds;
            return ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
                ->withHttpCode(ApiCode::HTTP_OK)
                ->withData($admin)
                ->withMessage(__('message.common.search.success'))
                ->build();
        }

        return ResponseBuilder::asError(ApiCode::HTTP_BAD_REQUEST)
            ->withHttpCode(ApiCode::HTTP_BAD_REQUEST)
            ->withMessage(__('message.common.search.fail'))
            ->build();
    }

    /**
     * 创建管理员
     *
     * @param CreateRequest $request
     * @return Response
     */
    public function create(CreateRequest $request)
    {
        $validated = $request->validated();
        return ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
            ->withHttpCode(ApiCode::HTTP_OK)
            ->withData(Admin::create($validated))
            ->withMessage(__('message.common.create.success'))
            ->build();
    }

    /**
     * 更新管理员
     *
     * @param UpdateRequest $request
     * @return Response
     */
    public function update(UpdateRequest $request)
    {
        $validated = $request->validated();
        $resultData = Admin::_update($validated);
        if ($resultData['result']) {

            return ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
                ->withHttpCode(ApiCode::HTTP_OK)
                ->withData($resultData['admin'])
                ->withMessage(__('message.common.update.success'))
                ->build();
        }

        return ResponseBuilder::asError(ApiCode::HTTP_BAD_REQUEST)
            ->withHttpCode(ApiCode::HTTP_BAD_REQUEST)
            ->withMessage(__('message.common.update.fail'))
            ->build();

    }


    /**
     * 删除管理员
     *
     * @param Request $request
     * @return Response
     */
    public function delete(Request $request)
    {
        $id = $request->post('id', 0);
        $admin = Admin::find($id);
        if ($admin) {
            $admin->delete();
            return ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
                ->withHttpCode(ApiCode::HTTP_OK)
                ->withMessage(__('message.common.delete.success'))
                ->build();
        }

        return ResponseBuilder::asError(ApiCode::HTTP_BAD_REQUEST)
            ->withHttpCode(ApiCode::HTTP_BAD_REQUEST)
            ->withMessage(__('message.common.delete.fail'))
            ->build();
    }


    /**
     * 自身更新
     *
     * @param UpdateSelfRequest $request
     * @return Response
     */
    public function updateSelf(UpdateSelfRequest $request)
    {
        $validated = $request->validated();
        $validated['id'] = $request->user('admin')->id;
        $resultData = Admin::_update($validated);
        if ($resultData['result']) {
            return ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
                ->withHttpCode(ApiCode::HTTP_OK)
                ->withData($resultData['admin'])
                ->withMessage(__('message.common.update.success'))
                ->build();
        }
        return ResponseBuilder::asError(ApiCode::HTTP_BAD_REQUEST)
            ->withHttpCode(ApiCode::HTTP_BAD_REQUEST)
            ->withMessage(__('message.common.update.fail'))
            ->build();
    }

    /**
     * 授权权限
     *
     * @param SyncPermissionsRequest $request
     * @return Response
     */
    public function syncPermissions(SyncPermissionsRequest $request)
    {
        $validated = $request->validated();
        $admin = Admin::find($validated['id']);
        $permissions = isset($validated['permissions']) ?
            Permission::whereIn('id', $validated['permissions'])->get() :
            [];
        $admin->syncPermissions($permissions);
        activity()
            ->useLog('admin')
            ->performedOn($admin)
            ->causedBy($request->user())
            ->withProperties($validated)
            ->log('update permissions');
        return ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
            ->withHttpCode(ApiCode::HTTP_OK)
            ->withData($admin)
            ->withMessage(__('message.common.update.success'))
            ->build();
    }
}
