<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::post('store_item', 'App\Http\Controllers\itemscontroller@store_item');
Route::get('viewitem', 'App\Http\Controllers\itemscontroller@getinsertview')->name('items');

Route::get('edit_item/{id}', 'App\Http\Controllers\itemscontroller@edititems')->name('edit');

Route::delete('delete_item/{id}', 'App\Http\Controllers\itemscontroller@deleteitem');

Route::put('update_item/{id}', 'App\Http\Controllers\itemscontroller@updateitem');

Route::get('fetchallitem', 'App\Http\Controllers\itemscontroller@getitems')->name('fetch');

Route::post('post_login', 'App\Http\Controllers\LoginController@loginfunction');
Route::post('store_registration', 'App\Http\Controllers\LoginController@store_registration');
Route::get('signuppage', 'App\Http\Controllers\LoginController@registrationfunction')->name('registration');