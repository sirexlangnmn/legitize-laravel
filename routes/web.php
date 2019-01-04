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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => ['auth']], function() {

    // Note: Update this route so we can dynamicaly add another roles with certaine permission. This is static method.
    Route::group(['middleware' => ['role:super-admin|admin']], function () {
       
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        Route::resource('projects', 'ProjectsController');
        Route::resource('clients', 'ClientsController');
        Route::resource('campaigns', 'CampaignController');      

    });

    Route::delete('user/{id}/remove-social-media', 'UserController@deleteSocialMedia');

    Route::get('user/profile/{user}', 'ProfileController@show')->name('profile');
    Route::get('user/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('user/profile/{user}', 'ProfileController@update')->name('profile.update');
});





