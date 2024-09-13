<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\SupplierController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/users', [AdminController::class, 'rec_user'])->name('users');
    Route::resource('users', AdminController::class);

    Route::get('/categories', [AdminController::class, 'rec_category'])->name('categories');
    Route::resource('categories', CategoryController::class);
    // Route::post('/admin/categories/clear-search', [CategoryController::class, 'clearSearch'])->name('admin.categories.clearSearch');

    Route::get('/products', [AdminController::class, 'rec_product'])->name('products');
    Route::resource('products', ProductController::class);

    Route::get('/orders', [AdminController::class, 'rec_order'])->name('orders');
    Route::resource('orders', OrderController::class);

    Route::get('/revenues', [RevenueController::class, 'rec_revenue'])->name('revenues');
    Route::resource('revenues', RevenueController::class);

    Route::get('/brands', [BrandController::class, 'rec_brands'])->name('brands');
    Route::resource('brands', BrandController::class);

    Route::get('/suppliers', [SupplierController::class, 'rec_suppliers'])->name('suppliers');
    Route::resource('suppliers', SupplierController::class);

    Route::get('/productTypes', [ProductTypeController::class, 'rec_productType'])->name('productTypes');
    Route::resource('productTypes', ProductTypeController::class);
});
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


require __DIR__ . '/auth.php';
