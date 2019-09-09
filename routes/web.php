<?php

Route::get('/', 'ThreadController@index');

Auth::routes();

Route::get('threads/fetch', 'ThreadController@fetch');
Route::resource('threads', 'ThreadController');

Route::resource('answers', 'AnswerController')->only(['index', 'store', 'update', 'destroy']);


