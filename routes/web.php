<?php

// SITE ROUTES


Route::get('/', 'HomeController@displayHome')->name('home');

Route::get('/signUpForm', 'UserController@signUp')->name('signUp');

Route::post('/register', 'UserController@register')->name('register');

Route::get('/loginForm', 'UserController@loginForm')->name('loginForm');

Route::post('/login', 'UserController@login')->name('login');

Route::get('/logout', 'UserController@logout')->name('logout');

Route::get('/articles/{articleId}', 'ArticleController@displayFullArticle')->name('displayFullArticle');

Route::get('/searchForm', 'ArticleController@searchForm')->name('searchForm');

Route::post('/searchArticle', 'ArticleController@searchArticle')->name('searchArticle');

Route::post('/saveComment', 'CommentController@saveComment')->name('saveComment');

Route::get('/authors/{userId}', 'UserController@displayAuthorPage')->name('displayAuthorPage');

Route::get('/users/profile/{userId}', 'UserController@displayUserProfile')->name('displayUserProfile');

Route::post('/users/profile/update', 'UserController@updateProfile')->name('updateProfile');





// CMS ROUTES

Route::prefix('cms')->middleware(['auth'])->group(function() {

    Route::get('/', 'cms\HomeController@cmsHome')->name('cmsHome');

    Route::get('/articles/', 'cms\ArticleController@getAllArticles')->name('allArticles');

    Route::get('/articles/newForm', 'cms\ArticleController@newArticleForm')->name('newArticleForm');
    Route::post('/articles/save', 'cms\ArticleController@saveNewArticle')->name('saveNewArticle');

    Route::get('/articles/edit/{articleId}', 'cms\ArticleController@editArticle')->name('editArticle');
    Route::post('/articles/update', 'cms\ArticleController@updateArticle')->name('updateArticle');

    Route::get('/articles/delete/{articleId}', 'cms\ArticleController@deleteArticle')->name('deleteArticle');

    Route::get('/logoForm', 'cms\HomeController@logoForm')->name('logoForm');
    Route::post('/saveLogo', 'cms\HomeController@saveLogo')->name('saveLogo');

    Route::get('/allUsers', 'cms\HomeController@getAllUsers')->name('allUsers');

    Route::get('/editUserProfile/{userId}', 'cms\UserController@editUserProfile')->name('cmsEditUserProfile');
    Route::post('/updateUserProfile', 'cms\UserController@updateUserProfile')->name('updateUserProfile');

    Route::post('/search', 'cms\ArticleController@search')->name('cmsSearch');

});
