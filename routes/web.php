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
Route::prefix('crewing')->group(function(){
    Route::get('/', 'Crewing\CandidateController@index')->name('crewing.candidates.index');
    
    Route::get('create', 'Crewing\CandidateController@create')->name('crewing.candidates.create');
    
    Route::post('/', 'Crewing\CandidateController@store')->name('crewing.candidates.store');

    Route::get('{candidate}', 'Crewing\CandidateController@show')->name('crewing.candidates.show');
    
    Route::get('{candidate}/edit', 'Crewing\CandidateController@edit')->name('crewing.candidates.edit');
    
});

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
    
    Route::prefix('products')->group(function () {
        Route::get('/', 'Admin\ProductController@index')->name('admin.products.index');
        
        Route::get('{site}/create', 'Admin\ProductController@create')->name('admin.products.create');
        Route::post('{site}', 'Admin\ProductController@store')->name('admin.products.store');
    });
    
    Route::prefix('attributes')->group(function () {
        Route::prefix('sets')->group(function () {
            Route::get('/', 'Admin\AttributeSetController@index')->name('admin.attributes.sets.index');

            Route::get('{site}/create', 'Admin\AttributeSetController@create')->name('admin.attributes.sets.create');
            Route::post('{site}', 'Admin\AttributeSetController@store')->name('admin.attributes.sets.store');

        });
        
        Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
        
        Route::get('{site}/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
        Route::post('{site}', 'Admin\AttributeController@store')->name('admin.attributes.store');

        Route::get('{attribute}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
        Route::put('{attribute}', 'Admin\AttributeController@update')->name('admin.attributes.update');
        
        Route::get('{site}/{attribute}/translation/create', 'Admin\AttributeTranslationController@create')->name('admin.attributes.translation.create');
        Route::post('{site}/{attribute}/translation', 'Admin\AttributeTranslationController@store')->name('admin.attributes.translation.store');



    });

});

Route::get('{url?}', 'Client\BaseController@reroute')->where('url', '.*');;
