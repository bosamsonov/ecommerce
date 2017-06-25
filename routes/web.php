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

    Route::prefix('languages')->group(function () {
        Route::get('/', 'Admin\LanguageController@index')->name('admin.languages.index');

        Route::get('create', 'Admin\LanguageController@create')->name('admin.languages.create');
        Route::post('/', 'Admin\LanguageController@store')->name('admin.languages.store');
        Route::delete('/', 'Admin\LanguageController@destroy')->name('admin.languages.destroy');

        Route::get('{language}', 'Admin\LanguageController@edit')->name('admin.languages.edit');
        Route::put('{language}', 'Admin\LanguageController@update')->name('admin.languages.update');

        Route::get('{language}/order', 'Admin\LanguageController@order')->name('admin.languages.order');
    });

});



Route::get('/', function () {
    return view('welcome');
});
