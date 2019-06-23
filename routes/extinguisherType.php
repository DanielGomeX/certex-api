<?php

Route::group(['prefix' => 'extinguisher-type', 'name' => 'extinguisher-type.'], function() {
    Route::get('index', 'ExtinguishersTypesController@index')->name('index');
});

