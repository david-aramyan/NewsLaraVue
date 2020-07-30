<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'NewsController@index')->name('news.index');
Route::get('news/{news}', 'NewsController@show')->name('news.show');

Route::get('/home', 'HomeController@index')->name('home');
