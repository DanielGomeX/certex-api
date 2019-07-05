<?php

Route::group(['prefix' => 'certification', 'name' => 'certification.'], function() {
    Route::get('all', 'CertificationsController@all')->name('all');
    Route::get('count', 'CertificationsController@count')->name('count');
    Route::post('store', 'CertificationsController@store')->name('store');
    Route::post('{id}/update', 'CertificationsController@update')->name('update');
    Route::get('{id}/destroy', 'CertificationsController@destroy')->name('destroy');
    Route::get('{id}/show', 'CertificationsController@show')->name('show');
    Route::get('{certificationId}/{extinguisherId}/generate', 'CertificationsController@generate')->name('generate');
});
