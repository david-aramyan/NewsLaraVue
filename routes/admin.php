<?php

use Illuminate\Support\Facades\Route;

/* Admin Auth Routes */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.form');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('dashboard', 'DashboardController@index');

Route::resource('news', 'NewsController');
