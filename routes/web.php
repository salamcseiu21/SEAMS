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

Route::get('/','WelcomeController@index');
Route::get('/test','WelcomeController@test');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getall', 'UploadController@getAll');
//---------------Admin Section-------------
Route::get('/admin-panel','AdminController@index');
Route::get('/log-in','AdminController@logIn');
Route::post('/admin-home','AdminController@postLogIn');


//---------Upload-----
Route::get('upload-dayend', 'UploadController@uploadDayEndinfo');
Route::post('importExcel', 'UploadController@uploadDayEndArchiveData');

Route::get('upload-markset-summary', 'UploadController@uploadMarketSummaryInfo');
Route::post('import-ms-data', 'UploadController@uploadMarketSummaryData');

Route::get('upload-share-holding', 'UploadController@uploadShareHoldingInfo');
Route::post('import-share-hold-data', 'UploadController@uploadShareHoldData');

Route::post('importExcel', 'UploadController@uploadDayEndArchiveData');