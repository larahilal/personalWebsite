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

Route::post('/saveComment', 'commentController@saveComment')->name('saveComment');

Route::get('/authors/{userId}', 'userController@displayAuthorPage')->name('displayAuthorPage');

Route::get('/users/profile/{userId}', 'userController@displayUserProfile')->name('displayUserProfile');

Route::post('/users/profile/update', 'userController@updateProfile')->name('updateProfile');





// CMS ROUTES

Route::prefix('cms')->middleware(['auth'])->group(function() {

    Route::get('/', 'cms\homeController@cmsHome')->name('cmsHome');

    Route::get('/articles/', 'cms\articleController@getAllArticles')->name('allArticles');

    Route::get('/articles/newForm', 'cms\articleController@newArticleForm')->name('newArticleForm');
    Route::post('/articles/save', 'cms\articleController@saveNewArticle')->name('saveNewArticle');

    Route::get('/articles/edit/{articleId}', 'cms\articleController@editArticle')->name('editArticle');
    Route::post('/articles/update', 'cms\articleController@updateArticle')->name('updateArticle');

    Route::get('/articles/delete/{articleId}', 'cms\articleController@deleteArticle')->name('deleteArticle');

    Route::get('/logoForm', 'cms\homeController@logoForm')->name('logoForm');
    Route::post('/saveLogo', 'cms\homeController@saveLogo')->name('saveLogo');

    Route::get('/allUsers', 'cms\homeController@getAllUsers')->name('allUsers');

    Route::get('/editUserProfile/{userId}', 'cms\UserController@editUserProfile')->name('cmsEditUserProfile');
    Route::post('/updateUserProfile', 'cms\UserController@updateUserProfile')->name('updateUserProfile');

});
