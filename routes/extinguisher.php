<?php

Route::group(['prefix' => 'extinguisher', 'name' => 'extinguisher.'], function() {
    Route::get('{skip}/{take}/index', 'ExtinguishersController@index')->name('index');
    Route::post('store', 'ExtinguishersController@store')->name('store');
    Route::get('{request}/show', 'ExtinguishersController@show')->name('show');
    Route::post('{id}/update', 'ExtinguishersController@update')->name('update');
    Route::get('{id}/destroy', 'ExtinguishersController@destroy')->name('destroy');
});

