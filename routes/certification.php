<?php

Route::group(['prefix' => 'certification', 'name' => 'certification.'], function() {
    Route::get('all', 'CertificationsController@all')->name('all');

    // Route::post('store', 'CertificationsController@store')->name('store');
    // Route::get('{id}/show', 'CertificationsController@show')->name('show');
    // Route::post('{id}/update', 'CertificationsController@update')->name('update');
    // Route::get('index', 'CertificationsController@index')->name('index');
    // Route::get('{id}/destroy', 'CertificationsController@destroy')->name('destroy');
});