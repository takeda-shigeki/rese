<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestaurantController;

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
Route::middleware('auth')->group(function () {
    Route::get('/mypage', [AuthController::class, 'my_page']);
});

Route::get('/thanks', function() {
    return View::make('auth.thanks');
});

Route::get('/', [RestaurantController::class, 'index']);
Route::get('/search', [RestaurantController::class, 'search']);
Route::post('/search', [RestaurantController::class, 'keyword_search']);

Route::get('/shop_detail', [RestaurantController::class, 'shop_detail']);
Route::post('/booking_indication', [RestaurantController::class, 'shop_detail']);


