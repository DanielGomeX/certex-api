<?php

Route::group(['prefix' => 'user', 'name' => 'user.'], function() {
    Route::get('{id}/show', 'UsersController@show')->name('show');
    Route::post('store', 'UsersController@store')->name('store');
    Route::post('{id}/update', 'UsersController@update')->name('update');
});
