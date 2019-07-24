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

Route::get('/', ['as' => 'home', 'uses' => "AdminController@index"]);

Route::get('login', ['as' => 'adminLogin', 'uses' => "AdminController@login"]);
Route::post('doLogin', "AdminController@doLogin");
Route::get('doLogin', "AdminController@doLogin");

Route::get('register', ['as' => 'adminRegister', 'uses' => "AdminController@register"]);
Route::get('doregister', ['as' => 'adminRegister', 'uses' => "AdminController@doregister"]);


// 进行服务端及管理员访问权限校验
Route::group (['middleware' => ['auth']], function ($app) {
  
    Route::post('admin/doCreate', "AdminController@doCreate");
    Route::get('admin/logout', "AdminController@logout");
    Route::get('admin/getprivilledge', "AdminController@getprivilledge");
    Route::post('admin/getprivilledge', "AdminController@getprivilledge");
    Route::get('admin/getList',  "AdminController@getList");
    Route::post('admin/getList',  "AdminController@getList");
    Route::get('admin/getrole',  "AdminController@getrole");
    Route::post('admin/getrole',  "AdminController@getrole");
    Route::get('admin/editAppid',  "AdminController@editAppid");
    Route::post('admin/editAppid',  "AdminController@editAppid");
    Route::get('admin/editPower',  "AdminController@editPower");
    Route::post('admin/getChannel',  "AdminController@getChannel");
    Route::get('admin/getChannel',  "AdminController@getChannel");
    Route::get('admin/searchResults',  "AdminController@searchResults");
    Route::post('admin/searchResults',  "AdminController@searchResults");
    Route::get('admin/contacts',  "AdminController@contacts");
    Route::post('admin/headUpload',  "AdminController@headUpload");
    Route::get('admin/headUpload',  "AdminController@headUpload");
   
    Route::get('tools/banji',  "ToolsController@banji");
    Route::get('tools/build',  "ToolsController@build");
    Route::get('tools/markdown',  "ToolsController@markdown");
    Route::get('tools/uploadfile',  "ToolsController@uploadfile");
    Route::post('tools/uploadfile',  "ToolsController@uploadfile");
    Route::get('tools/date',  "ToolsController@date");
    Route::get('tools/laydate',  "ToolsController@laydate");
    Route::get('tools/image',  "ToolsController@image");




    Route::get('user/info',  "UserController@info");


    Route::get('config/goods',  "ConfigController@goods");


    Route::get('stat/register',  "StatController@register");



    
   
});

Route::get('/home', 'HomeController@index');