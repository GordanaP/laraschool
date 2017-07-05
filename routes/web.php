<?php

// Auth
Auth::routes();

// Page
Route::as('pages.')->group(function(){
    Route::name('index')->get('/', 'PageController@index');
    Route::name('home')->get('/home', 'PageController@home');
});

// Thread
Route::resource('threads', 'ThreadController', [
    'only' => ['index', 'create', 'store']
]);
Route::as('threads.')->prefix('threads')->group(function(){
    Route::name('show')->get('/{category}/{thread}', 'ThreadController@show');
    Route::name('edit')->get('/{category}/{thread}/edit', 'ThreadController@edit');
    Route::name('update')->put('/{category}/{thread}', 'ThreadController@update');
    Route::name('destroy')->delete('/{category}/{thread}', 'ThreadController@destroy');
});

// Reply
Route::name('replies.store')->post('/{category}/{thread}/replies', 'ReplyController@store');

// Favorite
Route::name('favorites.replies.store')->post('/replies/{reply}/favorites', 'FavoriteController@store');

//Category
Route::resource('categories', 'CategoryController');

//Profile
Route::name('profiles.show')->get('profiles/@{user}', 'ProfileController@show');
Route::name('profiles.update')->put('profiles/@{user}', 'ProfileController@update');
Route::name('profiles.activites')->get('profiles/@{user}/activities', 'ProfileController@activities');
// Route::name('profiles.show.file')->get('profiles/avatar/@{user}', 'ProfileController@showFile');

