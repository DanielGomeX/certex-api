<?php

Route::group(['prefix' => 'user', 'name' => 'user.'], function() {
    Route::get('store', 'UserController@store')->name('store');
    Route::get('{id}/show', 'UserController@show')->name('show');
    Route::post('{id}/update', 'UserController@update')->name('update');
    // Route::get('{id}/destroy', 'UserController@destroy')->name('destroy');
});
