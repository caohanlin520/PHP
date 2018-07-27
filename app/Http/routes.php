<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/






//中间件

Route::group(['middleware'=>['web']],function (){

    Route::any('admin/Login/login','Admin\LoginController@login');
    Route::get('admin/Login/code',"Admin\LoginController@code");
//    Route::get("test","testController@index");



});

Route::group(['middleware'=>['web'],'prefix'=>'home/Index'],function (){

    Route::get('index','Home\IndexController@index');
    Route::get('cate/{cate_id}','Home\IndexController@cate');
    Route::get('article/{art_id}','Home\IndexController@article');


//    Route::get('home/Login/code',"Admin\LoginController@code");
//    Route::get("test","testController@index");



});

Route::group(['middleware'=>['admin.login'],'prefix'=>'admin/Index','namespace'=>'Admin'],function (){



    Route::get('index',"IndexController@index");
    Route::get('info',"IndexController@info");
    Route::get('quit',"IndexController@quit");
    Route::any('changePassword','IndexController@changePassword');
    Route::get('hell',"IndexController@hell");



});

Route::group(['middleware'=>['admin.login'],'prefix'=>'admin/Category','namespace'=>'Admin'],function (){
//
    Route::post('/changeOrder',"CategoryController@changeOrder");

    Route::resource('category', 'CategoryController');

});

Route::group(['middleware'=>['admin.login'],'prefix'=>'admin/Article','namespace'=>'Admin'],function (){
//

    Route::resource('article', 'ArticleController');


});


Route::group(['middleware'=>['admin.login'],'prefix'=>'admin/Common','namespace'=>'Admin'],function (){
//

    Route::any('upload', 'CommonController@upload');


});


Route::group(['middleware'=>['admin.login'],'prefix'=>'admin/Links','namespace'=>'Admin'],function (){
//

    Route::resource('links', 'LinksController');

    Route::post('changeOrder',"LinksController@changeOrder");
});

Route::group(['middleware'=>['admin.login'],'prefix'=>'admin/Navigator','namespace'=>'Admin'],function (){
//

    Route::resource('navigator', 'NavigatorController');

    Route::post('changeOrder',"LinksController@changeOrder");
});

Route::group(['middleware'=>['admin.login'],'prefix'=>'admin/Configure','namespace'=>'Admin'],function (){
//

    Route::resource('configure', 'ConfigureController');
    Route::post('changeOrder',"ConfigureController@changeOrder");

});