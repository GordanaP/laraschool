<?php

//Auth
Auth::routes();

//Page
Route::as('pages.')->group(function(){
    Route::name('index')->get('/', 'PageController@index');
    Route::name('home')->get('/', 'PageController@home');
});