<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FavorityController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PaymentController;

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
    Route::get('/my_page', [AuthController::class, 'my_page']);
    Route::get('/host', [AuthController::class, 'host']);
    Route::get('/admin', [AuthController::class, 'admin']);
    Route::post('/my_page/booking_indication', [BookingController::class, 'booking_indication']);
    Route::delete('/my_page/status', [BookingController::class, 'booking_delete']);
    Route::get('/my_page/booking_change', [BookingController::class, 'booking_change']);
    Route::post('/my_page/booking_change', [BookingController::class, 'booking_renewal']);
    Route::post('/my_page', [FavorityController::class, 'favority']);
    Route::post('/my_page/status', [FavorityController::class, 'favority_delete']);
    Route::get('/my_page/status', [StatusController::class, 'status']);
    Route::get('/my_page/rating', [RatingController::class, 'rating']);
    Route::post('/my_page/rating', [RatingController::class, 'rating_store']);
    Route::post('/host', [HostController::class, 'overview_update']);
    Route::post('/admin/register', [HostController::class, 'host_registration']);
    Route::delete('/admin/delete', [HostController::class, 'delete']);
    Route::post('/host/image_upload', [HostController::class, 'image_upload']);
    Route::get('/admin/mail', [MailController::class, 'mail']);
    Route::post('/admin', [MailController::class, 'send_mail']);
});

Route::get('/login', function() {
    return View::make('auth.login');
});

Route::get('/thanks', function() {
    return View::make('auth.thanks');
});

Route::get('/', [RestaurantController::class, 'index']);
Route::get('/search', [RestaurantController::class, 'search']);
Route::post('/search', [RestaurantController::class, 'keyword_search']);
Route::get('/shop_detail', [RestaurantController::class, 'shop_detail']);

Route::prefix('payment')->name('payment.')->group(function () {
    Route::get('/create', [PaymentController::class, 'create'])->name('create');
    Route::post('/store', [PaymentController::class, 'store'])->name('store');
});


