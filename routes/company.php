<?php

Route::group(['prefix' => 'company', 'name' => 'company.'], function() {
    Route::get('index', 'CompanyController@index')->name('index');
    Route::post('store', 'CompanyController@store')->name('store');
    Route::get('{request}/show', 'CompanyController@show')->name('show');
    Route::post('{id}/update', 'CompanyController@update')->name('update');
    Route::get('{id}/detroy', 'CompanyController@detroy')->name('detroy');
});

