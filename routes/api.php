<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function () {
//     dd('here');
// });

Route::post('user', function (Request $request) {
    $inputs = $request->all();
    dd($inputs['name']);
});

Route::get('about', function(){
    dd('error trated');
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
