<?php

return [

    /*
      |--------------------------------------------------------------------------
      | permissions
      |--------------------------------------------------------------------------
    */
    'permissions' => [
        [
            'id' => 1,
            'name' => 'UserController@index',
            'description' => '获取用户列表'
        ],
    ],

    /*
      |--------------------------------------------------------------------------
      | 前端菜单数据
      |--------------------------------------------------------------------------
      | route.path: 二级菜单会自动拼接上父类的path内容，作为路由实际使用的路径
      | children: 相当于父类id，树状结构，由于前端路由构造数据是children所有这里采用children
      | menu_type ： 为sidebar或者nochildren时会在侧边栏显示，nochildren只显示一级菜单
      |--------------------------------------------------------------------------
    */
    'menus' => [
        [
            'id' => 1,
            'label' => '首页',   //菜单名称
            'route' => [
                'name' =>'home',  //可用于路由跳转
                'path' => '/home',  //路由地址
                'component_path' => 'home/Index',
                'meta' => [
                    'icon' => 'el-icon-menu',   //图表样式
                    'menu_type' => 'noChildren',   //左侧菜单，没有二级菜单
                    'show_breadcrumbs' => true,
                    'breadcrumbs' => [
                        [
                            'label' => '首页'
                            //当需要跳转的时候加path字段，并且要开头为/
                            //'path' => '/home',
                        ]
                    ],
                ],
            ],
            'children' => 0,    //父id，菜单层级
        ],
        [
            'id' => 10,
            'label' => '一级菜单',
            'route' => [
                'name' =>'example',
                'path' => '/example',
                'component_path' => 'example/Index',
                'meta' => [
                    'icon' => 'el-icon-menu',
                    'menu_type' => 'sideBar',
                    'show_breadcrumbs' => true,
                    'breadcrumbs' => [
                        [
                            'label' => '首页'
                        ]
                    ],
                ],
            ],
            'children' => 0,
        ],
        [
            'id' => 11,
            'label' => '二级菜单',
            'route' => [
                'name' =>'example.second',
                'path' => 'second',
                'component_path' => 'example/Second',
                'meta' => [
                    //'icon' => 'el-icon-ui-panel',
                    'menu_type' => 'sideBar',
                    'show_breadcrumbs' => true,
                    'breadcrumbs' => [
                        [
                            'label' => '一级菜单'
                        ],
                        [
                            'label' => '二级菜单'
                        ]
                    ],
                ],
            ],
            'children' => 10,
        ],
        //menus底部
    ],

    //最外层
];
