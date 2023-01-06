<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportContoller;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\ChekoutController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\TransaksiController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomePageController::class, 'index']);
Route::get('/product', [HomePageController::class, 'product']);
Route::get('product/productView/{product}', [HomePageController::class, 'productView']);
Route::get('/featured', [HomePageController::class, 'featuredProduct']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('profile', [HomeController::class, 'updateProfile']);
    Route::get('createPassword', [HomeController::class, 'createPassword']);
    Route::post('change-password', [HomeController::class, 'changePassword']);
    Route::get('cart', [CartController::class, 'index']);
    Route::get('chekout', [ChekoutController::class, 'index']);
    Route::get('transaksi', [TransaksiController::class, 'index']);
    Route::get('order', [TransaksiController::class, 'show']);
    Route::get('order/detailOrder/{order}', [TransaksiController::class, 'detailOrder']);
});

// Route::get('/home', [App\Http\Controllers\Customer\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'chekRole'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::get('profile', [DashboardController::class, 'profile']);
    Route::post('profile', [DashboardController::class, 'updateProfile']);
    Route::get('createPassword', [DashboardController::class, 'createPassword']);
    Route::post('change-password', [DashboardController::class, 'changePassword']);
    Route::resource('product', ProductController::class);
    Route::get('product-image/{product_image_id}/delete', [ProductController::class, 'destroyImage']);
    Route::resource('slide', SlideController::class);
    Route::resource('order', ReportContoller::class);
    Route::get('/invoice/{order}', [ReportContoller::class, 'showInvoice']);
    Route::get('/invoice/{order}/download', [ReportContoller::class, 'pdfUnduh']);
    Route::get('/invoice/{order}/mail', [ReportContoller::class, 'sendGmail']);
    Route::resource('user', CustomerController::class);
    Route::resource('setting', SettingController::class);
});