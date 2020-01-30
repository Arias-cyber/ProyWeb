<?php

/*
|--------------------------------------------------------------------------
| Application 
|--------------------------------------------------------------------------
|
| Here is where you can register all of the  for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('DYV.index');
});

// Client dependecy injwction

Route::bind('client', function ($client){
    return App\Client::find($client);

});

// Admin -----------

Route::resource('admin/client', 'Admin\ClientController');
Route::resource('admin/project', 'Admin\ProjectController');