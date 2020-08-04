<?php
return [
    'common' => [
        'search' => [
            'success' => '查询成功',
            'fail' => '查询失败',
        ],
        'create' => [
            'success' => '添加成功',
            'fail' => '添加失败',
        ],
        'update' => [
            'success' => '更新成功',
            'fail' => '更新失败',
        ],
        'delete' => [
            'success' => '删除成功',
            'fail' => '删除失败',
            'fail_message' => '删除失败: :MESSAGE',
        ],
        'offset' => '起始数',
        'limit' => '条数',
        'order' => '排序方式',
        'sort' => '排序字段',
        'start_at' => '开始日期',
        'end_at' => '结束日期',
        'select_at_least_one' => '至少选择一个 :data',
    ],
    'permission' => [
        'permission' => '目录/权限',
        'pid' => '上级目录',
        'name' => '权限标识',
        'title' => '目录名称',
        'icon' => '目录图标',
        'path' => '目录路径',
        'component' => '目录地址',
        'guard_name' => '对应规则',
        'sort'    =>  '目录排序',
        'hidden'    =>  '目录显示',
        'delete_pid'    =>  '请先删除下级目录',
        'type' => '操作类型',
    ],
    'role' => [
        'id' => '角色',
        'name' => '角色标识',
        'permissions' => '权限/目录',
        'guard_id' => '对应规则ID',
    ],
    'admin' => [
        'id' => '用户ID',
        'name' => '用户名',
    ],
    'activity' => [
        'log_name' => '日志名称',
        'description' => '描述',
        'subject_id' => '影响ID',
        'subject_type' => '影响类型',
        'causer_id' => '操作者ID',
        'causer_type' => '操作者类型',
        'properties' => '属性',
    ],
    'exception' => [
        'message' => '错误信息',
        'id' => '错误ID',
        'solve' => '修复值',
    ],
    'user' => [
        'name' => '用户名',
    ],
];
