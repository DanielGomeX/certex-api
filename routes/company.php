<?php

Route::group(['prefix' => 'company', 'name' => 'company.'], function() {
    Route::get('{id}/show', 'CompanyController@show')->name('show');
    Route::post('{id}/update', 'CompanyController@update')->name('update');
    // Route::get('index', 'CompanyController@index')->name('index');
    // Route::get('{id}/destroy', 'CompanyController@destroy')->name('destroy');
});
