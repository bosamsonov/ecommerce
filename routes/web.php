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
        
        
        Route::get('{site}/translation/create', 'Admin\SiteTranslationController@create')->name('admin.sites.translation.create');
        Route::post('{site}/translation', 'Admin\SiteTranslationController@store')->name('admin.sites.translation.store');
        Route::delete('{site}/translation', 'Admin\SiteTranslationController@destroy')->name('admin.sites.translation.destroy');
        
        
        Route::get('{site}/translation/{siteTranslation}', 'Admin\SiteTranslationController@edit')->name('admin.sites.translation.edit');
        Route::put('{site}/translation/{siteTranslation}', 'Admin\SiteTranslationController@update')->name('admin.sites.translation.update');
        
        Route::get('{site}/translation/{siteTranslation}/order', 'Admin\SiteTranslationController@order')->name('admin.sites.translation.order');
    });
    
    Route::prefix('pages')->group(function () {
        Route::get('/', 'Admin\PageController@index')->name('admin.pages.index');
        
        Route::get('{site}/create', 'Admin\PageController@create')->name('admin.pages.create');
        Route::post('{site}', 'Admin\PageController@store')->name('admin.pages.store');
        
        Route::delete('/', 'Admin\PageController@destroy')->name('admin.pages.destroy');
        
        Route::get('{page}/translation/create', 'Admin\PageTranslationController@create')->name('admin.pages.translation.create');
        Route::post('{page}/translation', 'Admin\PageTranslationController@store')->name('admin.pages.translation.store');
        
        Route::get('{page}/translation/{pageTranslation}', 'Admin\PageTranslationController@edit')->name('admin.pages.translation.edit');
        Route::put('{page}/translation/{pageTranslation}', 'Admin\PageTranslationController@update')->name('admin.pages.translation.update');
    });

    // Route::prefix('languages')->group(function () {
    //     Route::get('/', 'Admin\LanguageController@index')->name('admin.languages.index');

    //     Route::get('create', 'Admin\LanguageController@create')->name('admin.languages.create');
    //     Route::post('/', 'Admin\LanguageController@store')->name('admin.languages.store');
    //     Route::delete('/', 'Admin\LanguageController@destroy')->name('admin.languages.destroy');

    //     Route::get('{language}', 'Admin\LanguageController@edit')->name('admin.languages.edit');
    //     Route::put('{language}', 'Admin\LanguageController@update')->name('admin.languages.update');
    // });

});



Route::get('/', function () {
    return view('welcome');
});
