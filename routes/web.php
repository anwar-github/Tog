<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('User.register');
});

Route::get('/nomor-1-number-{n}', 'LogicTest@isPrime')->name('nomor-1');

Route::get('/nomor-2', 'LogicTest@bigNumberInArray')->name('nomor-2');

Route::get('/nomor-3', 'LogicTest@formatNumber')->name('nomor-3');

Route::get('/nomor-4', 'LogicTest@bubbleSort')->name('nomor-4');

Route::get('/nomor-5', 'LogicTest@arrayCreative')->name('nomor-5');
