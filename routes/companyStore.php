<?php

Route::group(['prefix' => 'company', 'name' => 'company.'], function() {
    Route::post('store', 'CompanyController@store')->name('store');
});
