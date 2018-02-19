<?php

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WidgetsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CharacteristicsController;
//use App\Http\Controllers\AdditionalCharacteristicsController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return Auth::user();
});

Route::resource('welcome', WelcomeController::class, ['only' => ['index']]);

Route::post('/articles/get-many', ArticlesController::class.'@index');
Route::post('/articles/create', ArticlesController::class.'@store');
Route::post('/articles/update', ArticlesController::class.'@update');
Route::post('/articles/delete', ArticlesController::class.'@destroy');

Route::resource('articles', ArticlesController::class, ['except' => ['edit', 'show', 'create']]);

Route::post('/widgets/get-many', WidgetsController::class.'@index')->middleware('auth:api');
Route::post('/widgets/create', WidgetsController::class.'@store')->middleware('auth:api');
Route::post('/widgets/update', WidgetsController::class.'@update')->middleware('auth:api');
Route::post('/widgets/delete', WidgetsController::class.'@destroy')->middleware('auth:api');

Route::post('/products/get-many', ProductsController::class.'@index');
Route::post('/products/get', ProductsController::class.'@show');
Route::post('/products/delete', ProductsController::class.'@destroy')->middleware('auth:api');
Route::post('/products/create', ProductsController::class.'@store')->middleware('auth:api');
Route::post('/products/update', ProductsController::class.'@update')->middleware('auth:api');

Route::post('/images/get-many', AssetsController::class.'@index');
Route::post('/images/delete', AssetsController::class.'@destroy')->middleware('auth:api');
Route::post('/images/create', AssetsController::class.'@store')->middleware('auth:api');
Route::post('/images/update', AssetsController::class.'@update')->middleware('auth:api');


Route::post('/characteristics/get-many', CharacteristicsController::class.'@index')->middleware('auth:api');
Route::post('/characteristics/create', CharacteristicsController::class.'@store')->middleware('auth:api');
Route::post('/characteristics/update', CharacteristicsController::class.'@update')->middleware('auth:api');
Route::post('/characteristics/delete', CharacteristicsController::class.'@destroy')->middleware('auth:api');


Route::post('/categories/get-many', CategoriesController::class.'@getMany');
Route::post('/categories/create', CategoriesController::class.'@create');
Route::post('/categories/update', CategoriesController::class.'@update');
Route::post('/categories/delete', CategoriesController::class.'@delete');

Route::post('/types/get-many', TypesController::class.'@getMany');
Route::post('/types/create', TypesController::class.'@create');
Route::post('/types/update', TypesController::class.'@update');
Route::post('/types/delete', TypesController::class.'@delete');

Route::post('/colors/get-many', ColorsController::class.'@getMany');
Route::post('/colors/create', ColorsController::class.'@create');
Route::post('/colors/update', ColorsController::class.'@update');
Route::post('/colors/delete', ColorsController::class.'@delete');