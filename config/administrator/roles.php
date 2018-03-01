<?php
/**
 * User: 史
 * Date: 2018/03/01
 * Time: 13:48
 */

use Spatie\Permission\Models\Role;

return [

    'title' => '角色',

    'single' => '角色',

    //要操作的model
    'model' => Role::class,

    //什么权限可以进行该操作
    'permission' => function () {
        return Auth::user()->can('manage_users');
    },

    //页面显示表格的内容
    'columns' => [
        'id',
        'name' => [
            'title' => '标识'
        ],
        'permission' => [
            'title' => '权限',
            //output定制需要的内容
            'output' => function ($value, $model) {
                $model->load('permissions');
                $result = [];
                foreach ($model->permissions as $permission) {
                    $result[] = $permission->name;
                }

                return empty($result) ? 'N/A' : implode($result, ' | ');
            },
            'sortable' => false
        ],
        'operation' => [
            'title' => '管理',
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false
        ]
    ],

    'edit_fields' => [
        'name' => [
            'title' => '标识',
        ],
        'permissions' => [
            'type' => 'relationship',
            'title' => '权限',
            'name_field' => 'name',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => '标识',
        ]
    ],

    // 新建和编辑时的表单验证规则
    'rules' => [
        'name' => 'required|max:15|unique:roles,name',
    ],

    // 表单验证错误时定制错误消息
    'messages' => [
        'name.required' => '标识不能为空',
        'name.unique' => '标识已存在',
    ]
];