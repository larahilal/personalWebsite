<?php

// SITE ROUTES


Route::get('/', 'homeController@displayHome')->name('home');

Route::get('/signUpForm', 'userController@signUp')->name('signUp');

Route::post('/register', 'userController@register')->name('register');

Route::get('/loginForm', 'userController@loginForm')->name('loginForm');

Route::post('/login', 'userController@login')->name('login');

Route::get('/logout', 'userController@logout')->name('logout');

Route::get('/articles/{articleId}', 'articleController@displayFullArticle')->name('displayFullArticle');

Route::get('/searchForm', 'articleController@searchForm')->name('searchForm');

Route::post('/searchArticle', 'articleController@searchArticle')->name('searchArticle');


// CMS ROUTES

Route::get('/cms/', 'cms\homeController@cmsHome')->name('cmsHome');

Route::get('/cms/articles/', 'cms\articleController@getAllArticles')->name('allArticles');

Route::get('/cms/articles/newForm', 'cms\articleController@newArticleForm')->name('newArticleForm');
Route::post('/cms/articles/save', 'cms\articleController@saveNewArticle')->name('saveNewArticle');

Route::get('/cms/articles/edit/{articleId}', 'cms\articleController@editArticle')->name('editArticle');
Route::post('/cms/articles/update', 'cms\articleController@updateArticle')->name('updateArticle');

Route::get('/cms/articles/delete/{articleId}', 'cms\articleController@deleteArticle')->name('deleteArticle');

