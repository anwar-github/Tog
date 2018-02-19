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

Route::middleware('auth:api')->get('/User', function (Request $request) {
    return $request->user();
});

Route::post('sign-up', 'UserControler@actionRegister')->name('sign-up');
Route::post('sign-in', 'UserControler@actionLogin')->name('sign-in');
