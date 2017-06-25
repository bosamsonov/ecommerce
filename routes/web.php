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

//Route::resource('sites', 'Admin\SiteController');
//
Route::prefix('admin')->group(function () {
    Route::prefix('sites')->group(function () {
        Route::get('/', 'Admin\SiteController@index')->name('admin.sites.index');

        Route::get('create', 'Admin\SiteController@create')->name('admin.sites.create');
        Route::post('/', 'Admin\SiteController@store')->name('admin.sites.store');
        Route::delete('/', 'Admin\SiteController@destroy')->name('admin.sites.destroy');

        Route::get('{site}', 'Admin\SiteController@edit')->name('admin.sites.edit');
        Route::put('{site}', 'Admin\SiteController@update')->name('admin.sites.update');
    });
});



Route::get('/', function () {
    return view('welcome');
});
