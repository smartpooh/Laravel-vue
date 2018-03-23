<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//路由指向入口文件,/api/xxx指向api.php路由文件
Route::get('/{vue?}', function () {
        return view('index');
})->where('vue', '[\/\w\.-]*');
