## 关于w502

本库是在工作中项目初始框架的简化版本，主要展示了怎么搭建vue+laravel项目，可以直接clone，稍加改动即可使用。

- 前端使用vue + element ui，后端使用laravel5.5
- 打包工具使用laravel-mix
- 用户验证使用jwt-auth
- vue路由由后端定义，前端使用vue-router + axios实现登陆拦截
- 使用store + vue-router-sync 实现通过路由配置菜单和面包屑 

使用方法

1. 使用composer安装php包

    composer install

2. 使用yarn安装js包

    yarn

3. 生成jwt-auth密钥

    php artisan jwt:secret



