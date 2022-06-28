<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

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
//     return view('front/home');
// });

Route::get('/admin/home', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

// Route::get('/admin/products/', [ProductController::class, 'index'])->name('products.list');
// Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');

Route::group(['prefix' => 'admin/', 'as' => 'admin.'], function()
{
    // admin/products Routes
    Route::resource('products', ProductController::class, [
        'names' => [
            'index'     => 'products.index',
            'create'    => 'products.create',
            'store'     => 'products.store',
            'show'      => 'products.show',
            'edit'      => 'products.edit',
            'update'    => 'products.update',
            'destroy'   => 'products.destroy'
        ]
    ]);
    
    // admin/categories Routes
    Route::resource('categories', CategoryController::class);
});



Route::get('/', [HomeController::class, 'home']);

Route::get('/login', [HomeController::class, 'login']);

Route::get('/signup', [HomeController::class, 'signup']);

Route::get('/dashboard', [HomeController::class, 'dashboard']);

Route::get('/about-us', [HomeController::class, 'aboutUs']);

Route::get('/contact-us', [HomeController::class, 'contactUs']);

Route::get('/cart', [HomeController::class, 'cart']);

Route::get('/checkout', [HomeController::class, 'checkout']);

Route::get('/confirmation', [HomeController::class, 'confirmation']);

Route::get('/shop', [HomeController::class, 'shop']);

Route::get('/product-detail', [HomeController::class, 'productDetail']);

Route::get('/faq', [HomeController::class, 'faq']);