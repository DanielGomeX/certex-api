<?php

Route::group(['prefix' => 'answers', 'name' => 'answers.'], function() {
    Route::get('all', 'AnswersController@all')->name('all');
    Route::post('store', 'AnswersController@store')->name('store');
    Route::get('{id}/show', 'AnswersController@show')->name('show');
    Route::post('{id}/update', 'AnswersController@update')->name('update');
    // Route::get('index', 'AnswersController@index')->name('index');
    // Route::get('{id}/destroy', 'AnswersController@destroy')->name('destroy');
});
