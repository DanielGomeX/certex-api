<?php

Route::group(['prefix' => 'extinguisher', 'name' => 'extinguisher.'], function() {
    Route::get('{skip}/{take}/index', 'ExtinguishersController@index')->name('index');
    Route::get('all', 'ExtinguishersController@all')->name('all');
    Route::post('store', 'ExtinguishersController@store')->name('store');
    Route::get('count', 'ExtinguishersController@count')->name('count');
    Route::get('{id}/show', 'ExtinguishersController@show')->name('show');
    Route::post('{id}/update', 'ExtinguishersController@update')->name('update');
    Route::get('{id}/destroy', 'ExtinguishersController@destroy')->name('destroy');
});

