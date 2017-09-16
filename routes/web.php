<?php


Route::get('/', 'loginController@displayHome')->name('home');

Route::get('/login', 'loginController@login')->name('login');

