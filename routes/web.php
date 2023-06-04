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


Route::get('/', function () {
     return redirect(url('/').'/admin');
});

Route::get('admin','BackendController@index');
Route::get('admin/login','BackendController@login');
Route::get('admin/register','BackendController@register');
Route::get('admin/forgot-password','BackendController@forgotPassword');
Route::post('admin/forgot-password','BackendController@sendEmail');
Route::get('/reset/{email}/{time}','BackendController@startReset');
Route::post('admin/reset-password','BackendController@resetPassword');
Route::get('admin/logout','BackendController@logout');
Route::post('admin/login','BackendController@signin');
Route::post('admin/register','BackendController@store');
Route::post('ajaxRequest', 'BackendController@ajaxRequestPost')->name('ajaxRequest.post');
Route::post('ajaxRequestData', 'BackendController@ajaxRequestPostData')->name('ajaxRequestData.post');
Route::post('ajaxRequestAcc', 'BackendController@ajaxRequestPostAcc')->name('ajaxRequestAcc.post');
Route::post('ajaxRequestActivate', 'BackendController@ajaxRequestPostActivate')->name('ajaxRequestActivate.post');
Route::post('ajaxRequestDeactivate', 'BackendController@ajaxRequestPostDeactivate')->name('ajaxRequestDeactivate.post');
Route::get('admin/content/{name}','BackendController@contents');
Route::post('admin/content/change-password','BackendController@changePassword');
Route::get('admin/logout','BackendController@logout');
Route::post('admin/action/block-activation','BackendController@blockActivation');
Route::post('admin/action/remove-activation','BackendController@removeActivation');
Route::post('admin/action/activate-activation','BackendController@activateActivation');
Route::post('admin/action/device-setting','BackendController@deviceSettings');
Route::post('admin/action/enable-device','BackendController@enableDevice');
Route::post('admin/action/disable-device','BackendController@disableDevice');
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});