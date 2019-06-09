<?php

Route::group(['prefix' => 'manufacturer', 'name' => 'manufacturer.'], function() {
    Route::get('{ini}/{end}/index', 'ManufacturersController@index')->name('index');
    Route::post('store', 'ManufacturersController@store')->name('store');
    Route::get('{request}/show', 'ManufacturersController@show')->name('show');
    Route::post('{id}/update', 'ManufacturersController@update')->name('update');
    Route::get('{id}/destroy', 'ManufacturersController@destroy')->name('destroy');
});

