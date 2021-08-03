<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => 'backend/foohello',
    'middleware' => ['web','auth'],
    'as'=> 'backend.foohello.',
],function () {
    Route::get('/', 'FooHelloController@index')->name('index');
});
Route::group([
    'prefix' => 'backend/foohello',
    'middleware' => ['web','auth'],
    'as'=> 'backend.foohello.',
], function () {
    Route::group([
        'prefix'=>'foohellos',
        'as' =>'foohellos.',
        'middleware' =>[]
    ],function () {
        Route::get('', 'Foohellos@index')->name('index');
        Route::get('create/{context?}', 'Foohellos@create')->name('create');
        Route::get('update/{id}/{context?}', 'Foohellos@update')->name('update');
    });
});