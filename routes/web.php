<?php

// SITE ROUTES


Route::get('/', 'userController@displayHome')->name('home');

Route::get('/signUpForm', 'userController@signUp')->name('signUp');

Route::post('/register', 'userController@register')->name('register');

Route::get('/loginForm', 'userController@loginForm')->name('loginForm');

Route::post('/login', 'userController@login')->name('login');

Route::get('/signedInHome', 'userController@signedInHome')->name('signedInHome');



// CMS ROUTES

Route::get('/cms/', 'cmsController@cmsHome')->name('cmsHome');

Route::get('/cms/articles/', 'articleController@getAllArticles')->name('allArticles');

Route::get('/cms/articles/newForm', 'articleController@newArticleForm')->name('newArticleForm');
Route::post('/cms/articles/save', 'articleController@saveNewArticle')->name('saveNewArticle');

Route::get('/cms/articles/edit/{articleId}', 'articleController@editArticle')->name('editArticle');
Route::post('/cms/articles/update', 'articleController@updateArticle')->name('updateArticle');

Route::get('/cms/articles/delete', 'articleController@deleteArticle')->name('deleteArticle');

