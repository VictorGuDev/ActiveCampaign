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
    return view('welcome');
});

Route::get('/viewList/{any}', 'ActiveCampaignController@viewList');
Route::get('/viewContact/{any}', 'ActiveCampaignController@viewContact');
Route::get('/addContact', 'ActiveCampaignController@addContact');
Route::get('/updateContact', 'ActiveCampaignController@updateContact');