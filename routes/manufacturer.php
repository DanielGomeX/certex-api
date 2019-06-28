<?php

Route::group(['prefix' => 'manufacturer', 'name' => 'manufacturer.'], function() {
    Route::get('{skip}/{take}/index', 'ManufacturersController@index')->name('index');
    Route::post('store', 'ManufacturersController@store')->name('store');
    Route::get('{id}/show', 'ManufacturersController@show')->name('show');
    Route::get('count', 'ManufacturersController@count')->name('count');
    Route::post('{id}/update', 'ManufacturersController@update')->name('update');
    Route::get('{id}/destroy', 'ManufacturersController@destroy')->name('destroy');
});

