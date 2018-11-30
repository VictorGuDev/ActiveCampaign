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
$route = Request::segments();
$done = false;
if (!$done && isset($route[0]) && $route[0] == 'ac'){
    $done = true;
    Route::group(['prefix' => 'ac'], function(){
        Route::get('/viewList/{any}', 'ActiveCampaignController@viewList');
        Route::get('/viewContact/{any}', 'ActiveCampaignController@viewContact');
        Route::get('/addContact', 'ActiveCampaignController@addContact');
        Route::get('/updateContact/{any}', 'ActiveCampaignController@updateContact');
        Route::any('/webhook/contactUpdate', "AcWebhookController@contactUpdate");
    });
}
if(!$done){
    Route::get('/', function () { return view('welcome'); });
    /*************************************************/
    // orginal routes of active campaign services 
    /*************************************************/
    Route::get('/viewList/{any}', 'ActiveCampaignController@viewList');
    Route::get('/viewContact/{any}', 'ActiveCampaignController@viewContact');
    Route::get('/addContact', 'ActiveCampaignController@addContact');
    Route::get('/updateContact', 'ActiveCampaignController@updateContact');
}