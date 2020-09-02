<?php
return [
    'common' => [
        'search' => [
            'success' => 'Query successful',
            'fail' => 'Query failed',
        ],
        'create' => [
            'success' => 'Add successfully',
            'fail' => 'Add failed',
        ],
        'update' => [
            'success' => 'Update successfully',
            'fail' => 'Update failed',
        ],
        'delete' => [
            'success' => 'Delete successfully',
            'fail' => 'Delete failed',
            'fail_message' => 'Delete failed: :MESSAGE',
        ],
        'offset' => 'Starting number',
        'limit' => 'Number of pieces',
        'order' => 'Sort order',
        'sort' => 'Sort field',
        'start_at' => 'Start date',
        'end_at' => 'End date',
        'select_at_least_one' => 'Select at least one :data',
    ],
    'permission' => [
        'permission' => 'Directory / permissions',
        'pid' => 'Superior directory',
        'name' => 'Permission identification',
        'title' => 'Directory name',
        'icon' => 'Table of contents Icon',
        'path' => 'Directory path',
        'component' => 'Directory address',
        'guard_name' => 'Correspondence rules',
        'sort'    =>  'Catalog sorting',
        'hidden'    =>  'Directory display',
        'delete_pid'    =>  'Please delete the subordinate directory first',
        'type' => 'Operation type',
    ],
    'role' => [
        'id' => 'Role',
        'name' => 'Role identification',
        'permissions' => 'Permissions / directory',
        'guard_id' => 'Corresponding rule ID',
    ],
    'admin' => [
        'id' => 'User ID',
        'name' => 'User name',
    ],
    'activity' => [
        'log_name' => 'Log name',
        'description' => 'Describe',
        'subject_id' => 'Subject ID',
        'subject_type' => 'Subject type',
        'causer_id' => 'Causer ID',
        'causer_type' => 'Causer type',
        'properties' => 'properties',
    ],
    'exception' => [
        'message' => 'Error message',
        'id' => 'Error ID',
        'solve' => 'Repair value',
        'file' => 'File',
    ],
    'user' => [
        'name' => 'User name',
    ],
    'file' => [
        'file' => 'File',
        'name' => 'File Name',
        'directory' => 'Directory path'
    ]
];
