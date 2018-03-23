
本库主要展示了怎么搭建vue+laravel项目，可以直接clone，稍加改动即可使用。

## 主要实现了：

- 前端使用vue + element ui，后端使用laravel5.5
- 使用jwt验证用户身份，替换默认的session验证方式
- 前端路由由后端配置文件定义，实现权限控制(已预留想法，自己实现)
- 对vue-router进行路由拦截，未登录用户跳转到登录页面，根据后台获取的菜单数据，组织前端路由
- 使用axios处理ajax请求和响应，请求时自动加上头部信息Authorization，配合后端jwt-auth进行身份认证；响应时根据响应码弹出不同错误信息
- 使用store + vue-router-sync，实现自动面包屑等
- 打包工具使用laravel-mix，当然可以使用其它打包工具

## 使用方法

#### 1. 生成配置
```
cp .env.example .env
```
然后配置.env文件,如果你是正式使用则最好去相应文件改，不建议使用.env控制配置。

#### 2. 使用composer安装php包
```
composer install
```

#### 3. 生成key
```
php artisan key:generate
php artisan jwt:secret
```

#### 4. 数据库迁移
```
php artisan migrate
```

#### 5. 安装js包
使用yarn
```
yarn
```
或者使用npm
```
npm install
```

#### 6. 使用laravel-mix打包
```
npm run production
```

#### 7. 测试
如果没有nginx，apache等服务，可以使用laravel自带server测试
```
php artisan serve --host=0.0.0.0 --port=80  
```
访问你自己的服务器
```
xxx.xxx.xxx.xxx
```
成功后会进入登录页面，登录账号密码  test 123456


