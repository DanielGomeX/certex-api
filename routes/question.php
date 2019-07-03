<?php

Route::group(['prefix' => 'question', 'name' => 'question.'], function() {
    Route::get('all', 'QuestionsController@all')->name('all');
    // Route::post('store', 'CompanyController@store')->name('store');
    // Route::get('{id}/show', 'CompanyController@show')->name('show');
    // Route::post('{id}/update', 'CompanyController@update')->name('update');
    // Route::get('index', 'CompanyController@index')->name('index');
    // Route::get('{id}/destroy', 'CompanyController@destroy')->name('destroy');
});
