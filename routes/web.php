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

Route::get('/', 'PagesController@root')->name('root');

//登录，注册路由
Auth::routes();

//用户
Route::resource('users', 'UsersController');

//话题路由
Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);

//帖子分类
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

//发布话题时，在文本框选择图片上传路由
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');

//话题详细信息页面，加了seo url 优化
Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');

//回复功能
Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);

//消息通知
Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);

//无权限进入管理者画面时使用的路由
Route::get('permission-denied', 'PagesController@permissionDenied')->name('permission-denied');