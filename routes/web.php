<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopcartController;
use App\Http\Controllers\Frontend\CustomerLoginController;
use App\Http\Controllers\Admin\DealController;
use App\Http\Controllers\Admin\PageController;


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

// frontend page route
Route::get('/pageDetail/{slug}', [HomeController::class, 'pageDetail']);

// frontend product routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/category/{slug}', [HomeController::class, 'allProductsByCat']);
Route::get('/brand/{slug}', [HomeController::class, 'allProductsByBrand']);
Route::get('/detail/{slug}', [HomeController::class, 'productDetail']);
Route::get('/search', [HomeController::class, 'searchProduct']);
Route::get('/menCollection', [HomeController::class, 'menCollection']);


// frontend cart routes
Route::get('/cart', [ShopcartController::class, 'cart']);
Route::get('/cartAdd/{slug}', [ShopcartController::class, 'cartAdd']);
Route::get('/cartDelete/{row_id}', [ShopcartController::class, 'cartDelete']);
Route::get('/cartDec/{row_id}', [ShopcartController::class, 'cartDec']);
Route::get('/cartInc/{row_id}', [ShopcartController::class, 'cartInc']);
Route::get('/checkout', [ShopcartController::class, 'checkout']);
Route::post('/doCheckout', [ShopcartController::class, 'doCheckout']);



//route admin login
Route::get('/admin/login', [LoginController::class, 'login'])->name('login');
Route::post('/admin/doLogin', [LoginController::class, 'doLogin']);  
Route::get('/admin/logout', [LoginController::class, 'logout']);
Route::get('/admin', [MainController::class, 'index'])->name('admin')->middleware('auth');

//route customer login
Route::get('/login', [CustomerLoginController::class, 'login'])->name('customerLogin');
Route::post('/doLogin', [CustomerLoginController::class, 'doLogin']); 
Route::get('/logout', [CustomerLoginController::class, 'logout']);

//route customer register
Route::get('/register', [CustomerLoginController::class, 'register'])->name('register');
Route::post('/doRegister', [CustomerLoginController::class, 'doRegister'])->name('doRegister');

//route link 
Route::get('/product', [HomeController::class, 'productAll']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('doContact',[HomeController::class, 'doContact']);




//route authutication
//midleware group
Route::middleware(['auth:user'])->group(function () {

    //prefix group
    Route::prefix('/admin')->group(function () {

        //login
        Route::get('logout', [LoginController::class, 'logout']);
        Route::get('/', [MainController::class, 'index'])->name('admin');

        //category
        Route::resource('/category', CategoryController::class);
        Route::get('/category/{id}/trash', [CategoryController::class, 'trash']);
        Route::get('/category-intrash', [CategoryController::class, 'intrash']);
        Route::get('/category/{id}/restore', [CategoryController::class, 'restore']);
        Route::get('/category/{id}/changeStatus', [CategoryController::class, 'changeStatus']);

        //deal
        Route::resource('/deal', DealController::class);
        Route::get('/deal/{id}/trash', [DealController::class, 'trash']);
        Route::get('/deal-intrash', [DealController::class, 'intrash']);
        Route::get('/deal/{id}/restore', [DealController::class, 'restore']);
        Route::get('/deal/{id}/changeStatus', [DealController::class, 'changeStatus']);

        //brand
        Route::resource('/brand', BrandController::class);
        Route::get('/brand/{id}/trash', [BrandController::class, 'trash']);
        Route::get('/brand-intrash', [BrandController::class, 'intrash']);
        Route::get('/brand/{id}/restore', [BrandController::class, 'restore']);
        

        //link
        Route::resource('/link', LinkController::class);
        Route::get('/link/{id}/trash', [LinkController::class, 'trash']);
        Route::get('/link-intrash', [LinkController::class, 'intrash']);
        Route::get('/link/{id}/restore', [LinkController::class, 'restore']);
        Route::get('/link/{id}/changeStatus', [LinkController::class, 'changeStatus']);

        //product
        Route::resource('/product', ProductController::class);
        Route::get('/product/{id}/trash', [ProductController::class, 'trash']);
        Route::get('/product-intrash', [ProductController::class, 'intrash']);
        Route::get('/product/{id}/restore', [ProductController::class, 'restore']);
        //Route::get('/product/{id}/changeStatus', [ProductController::class, 'changeStatus']);

        //page
        Route::resource('/page', PageController::class);
        Route::get('/page/{id}/trash', [PageController::class, 'trash']);
        Route::get('/page-intrash', [PageController::class, 'intrash']);
        Route::get('/page/{id}/restore', [PageController::class, 'restore']);
        Route::get('/page/{id}/changeStatus', [PageController::class, 'changeStatus']);
    });

    
});
