<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// middleware('auth:api')->

// Route::group(['middleware' => ['auth:api']], function () {
    Route::prefix('admin')->group(function () {
            Route::prefix('attributes')->group(function () {
                Route::prefix('sets')->group(function () {
                    Route::prefix('site')->group(function () {
                        Route::get('{site}', 'Api\Admin\AttributeSetController@showSiteAttributes');
                    });
                });
            });
    });
// // });

// Route::group(['middleware' => ['auth:api']], function () {
//     Route::get('/test', function (Request $request) {
//          return response()->json(['name' => 'test']);
//     });
// });