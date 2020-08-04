<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware([])->namespace('Home')->name('home.')->group(function () {

});

Route::middleware(['lang'])->namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout');
    Route::post('refresh', 'LoginController@refresh');
    Route::middleware(['jwt.role:admin', 'jwt.auth'])->group(function () {
        Route::post('me', 'LoginController@me');
        Route::middleware(['auth:admin'])->group(function () {
            // 权限
            Route::post('permission/create', 'PermissionController@create')->middleware('permission:permission.create');
            Route::post('permission/update', 'PermissionController@update')->middleware('permission:permission.update');
            Route::post('permission/delete', 'PermissionController@delete')->middleware('permission:permission.delete');
            Route::post('permission', 'PermissionController@permission')->middleware('permission:permission.permission');
            Route::post('permissions', 'PermissionController@permissions')->middleware('permission:permission.permissions');
            Route::post('permission/tree', 'PermissionController@permissionsTree')->middleware('permission:permission.permissions');
            Route::post('permission/drop', 'PermissionController@drop')->middleware('permission:permission.update');
            // 角色
            Route::post('role/create', 'RoleController@create')->middleware('permission:role.create');
            Route::post('role/update', 'RoleController@update')->middleware('permission:role.update');
            Route::post('role/delete', 'RoleController@delete')->middleware('permission:role.delete');
            Route::post('role/syncPermissions', 'RoleController@syncPermissions')->middleware('permission:role.syncPermissions');
            Route::post('role/syncRoles', 'RoleController@syncRoles')->middleware('permission:role.syncRoles');
            Route::post('role', 'RoleController@role')->middleware('permission:role.role');
            Route::post('roles', 'RoleController@roles')->middleware('permission:role.roles');
            Route::post('role/all', 'RoleController@allRoles')->middleware('permission:role.roles');
            // 用户
            Route::post('user/create', 'UserController@create')->middleware('permission:user.create');
            Route::post('user/update', 'UserController@update')->middleware('permission:user.update');
            Route::post('user/delete', 'UserController@delete')->middleware('permission:user.delete');
            Route::post('user', 'UserController@user')->middleware('permission:user.user');
            Route::post('users', 'UserController@users')->middleware('permission:user.users');
            // 管理员
            Route::post('admin/create', 'AdminController@create')->middleware('permission:admin.create');
            Route::post('admin/update', 'AdminController@update')->middleware('permission:admin.update');
            Route::post('admin/delete', 'AdminController@delete')->middleware('permission:admin.delete');
            Route::post('admin/syncPermissions', 'AdminController@syncPermissions')->middleware('permission:admin.syncPermissions');
            Route::post('admin/updateSelf', 'AdminController@updateSelf');
            Route::post('admins', 'AdminController@admins')->middleware('permission:admin.admins');
            Route::post('admin', 'AdminController@admin')->middleware('permission:admin.admin');
            // 操作记录
            Route::post('active/logs', 'ActiveLogController@logs')->middleware('permission:activeLog.activeLogs');
            // 异常记录
            Route::post('exception/logs', 'ExceptionErrorController@logs')->middleware('permission:exceptionError.exceptionErrors');
            Route::post('exception/amended', 'ExceptionErrorController@amended')->middleware('permission:exceptionError.amended');
        });
    });
});
