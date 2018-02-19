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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\API;
//// auth роуты
Route::post('/api/login', \App\Http\Controllers\Auth\LoginController::class.'@login');
Route::post('/api/logout', \App\Http\Controllers\Auth\LoginController::class.'@logout');

\Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Auth::routes();
});

Route::post('/bicycles', function () {
    sleep(25);
    return [
        [
            'id'=>7,
        ],
        [
            'id'=>2,
        ],
        [
            'id'=>3,
        ],
    ];
});

/**
 * API Section TODO: api роуты должны лежать всегда в файлике api.php, кроме тех, которые требуют модифицирования сесии. такие как /api/login и /api/logout
 */
//Route::get('/api/categories', API::class.'@categories');
//Route::get('/api/products', API::class.'@products');
//Route::get('/api/articles', API::class.'@articles');

//Route::get('/api/user', API::class.'@articles');



// эти роуты должны быть снизу закрывающими.
Route::get('/admin/{slug?}', HomeController::class . '@admin')->where('slug', '([A-z\d-\/_.]+)?')->middleware('auth');
Route::get('/{slug?}', HomeController::class . '@client')->where('slug', '([A-z\d-\/_.]+)?');


