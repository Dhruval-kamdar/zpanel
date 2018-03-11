<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'Front\LoginController@home')->name("home");
Route::get('/admin', 'Front\LoginController@login')->name("main");
Route::get('/downloadfile/{id}', 'Front\LoginController@download')->name("download");
Route::get('/minor', 'HomeController@minor')->name("minor");
Route::match(['get', 'post'], '/register', ['as' => 'register', 'uses' => 'Front\LoginController@register']);
Route::match(['post'], '/signup/get-lat-long', ['as' => 'signup-get-lat-long', 'uses' => 'Front\LoginController@getLatLong']);
Route::match(['get', 'post'], '/login', ['as' => 'login', 'uses' => 'Front\LoginController@login']);
Route::match(['get', 'post'], '/logout', ['as' => 'logout', 'uses' => 'Front\LoginController@logout']);
Route::match(['get', 'post'], '/pagedetail/{id}', ['as' => 'pagedetail', 'uses' => 'Front\LoginController@pagedetail']);

Route::match(['get', 'post'], '/admin/dashboard', ['as' => 'company-dashboard', 'uses' => 'Admin\DashboardController@dashboard']);
Route::match(['get', 'post'], '/admin/edit-profile', ['as' => 'company-edit-profile', 'uses' => 'Admin\ProfileController@editProfile']);
Route::match(['post'], '/admin/edit-chnagepassowrd', ['as' => 'change-password', 'uses' => 'Admin\ProfileController@changePassword']);
Route::match(['post'], '/admin/change-profile-pic', ['as' => 'change-profile-pic', 'uses' => 'Admin\ProfileController@changeProfilePic']);

Route::match(['get','post'], '/admin/file-upload', ['as' => 'file-upload', 'uses' => 'Admin\FileuploadController@fileupload']);
Route::match(['get','post'], '/admin/file-upload-add', ['as' => 'file-upload-add', 'uses' => 'Admin\FileuploadController@fileuploadadd']);
Route::match(['get','post'], '/admin/file-upload-edit/{id}', ['as' => 'file-upload-edit', 'uses' => 'Admin\FileuploadController@fileUploadEdit']);
Route::match(['get','post'], '/admin/file-upload-delete', ['as' => 'file-upload-delete', 'uses' => 'Admin\FileuploadController@fileUploadDelete']);
Route::match(['get','post'], '/admin/file-upload-status/{id}', ['as' => 'file-upload-status', 'uses' => 'Admin\FileuploadController@fileUploadStatus']);

Route::match(['get','post'], '/admin/pages', ['as' => 'pages', 'uses' => 'Admin\PagesController@index']);
Route::match(['get','post'], '/admin/pages-add', ['as' => 'pages-add', 'uses' => 'Admin\PagesController@pagesAdd']);
Route::match(['get','post'], '/admin/pages-edit/{id}', ['as' => 'pages-edit', 'uses' => 'Admin\PagesController@pagesEdit']);
Route::match(['get','post'], '/admin/pages-delete', ['as' => 'pages-delete', 'uses' => 'Admin\PagesController@pagesDelete']);

//Route::match(['get', 'post'], '/dashboard', ['as' => 'dashboard', 'uses' => 'Front\LoginController@dashboard']);