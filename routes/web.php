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

Route::get('/', 'HomeController@index');

Auth::routes();

/**
 * Profile routes
 */
Route::group(['middleware' => 'auth', 'namespace' => 'Profile', 'as' => 'profile.'], function() {
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::put('/user/{id}/change-profile', 'UserController@changeProfile')->name('change-profile')->where(['id' => '[0-9]+']);
    Route::put('/user/{id}/change-picture', 'UserController@changePicture')->name('change-picture')->where(['id' => '[0-9]+']);
    Route::put('/user/{id}/remove-picture', 'UserController@removePicture')->name('remove-picture')->where(['id' => '[0-9]+']);
    Route::put('/user/{id}/change-password', 'UserController@changePassword')->name('change-password')->where(['id' => '[0-9]+']);

});

/**
 * Permission's routes to modify users
 */
Route::group(['middleware' => 'auth', 'namespace' => 'Permission', 'as' => 'users.'], function() {
    Route::put('/user/{id}/block', 'UserController@blockUser')->name('block')->where(['id' => '[0-9]+']);
    Route::put('/user/{id}/unblock', 'UserController@unblockUser')->name('unblock')->where(['id' => '[0-9]+']);
});

/**
 * Test routes
 */
Route::group(['middleware' => 'auth', 'namespace' => 'Test'], function() {
    Route::resource('testes', 'TestController');
});


//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/dashboard', 'HomeController@index')->name('dashboard');
