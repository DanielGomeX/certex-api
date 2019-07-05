<?php

Route::group(['prefix' => 'user', 'name' => 'user.'], function() {
    Route::get('store', 'UsersController@store')->name('store');
    Route::get('{id}/show', 'UsersController@show')->name('show');
    Route::post('{id}/update', 'UsersController@update')->name('update');
});
