<?php

// Route::get('login', function(){
//     dd('We are here!');
// });

// Route::get('login', 'AuthController@login')->name('login');
Route::post('login', 'AuthController@login')->name('login');
