<?php

Route::group(['prefix' => 'extinguisher-type', 'name' => 'extinguisher-type.'], function() {
    Route::get('all', 'ExtinguishersTypesController@all')->name('index');
    Route::get('count', 'ExtinguishersTypesController@count')->name('count');
});

