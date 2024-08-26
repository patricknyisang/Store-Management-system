<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('items');
});
Route::post('store_item', 'App\Http\Controllers\itemscontroller@store_item');
Route::get('viewitem', 'App\Http\Controllers\itemscontroller@getinsertview')->name('items');

Route::get('edit_item/{id}', 'App\Http\Controllers\itemscontroller@edititems')->name('edit');

Route::delete('delete_item/{id}', 'App\Http\Controllers\itemscontroller@deleteitem');

Route::put('update_item/{id}', 'App\Http\Controllers\itemscontroller@updateitem');

Route::get('fetchallitem', 'App\Http\Controllers\itemscontroller@getitems')->name('fetch');