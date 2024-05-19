<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OfferBannerController;
use App\Http\Controllers\CartController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/banner', [BannerController::class,'banner_add'])->name('banner_add');
Route::post('/banner/add', [BannerController::class,'banner_create'])->name('banner_create');
Route::get('/banner/show', [BannerController::class,'banner_show'])->name('banner_show');
Route::get('/banner/edit/{id}', [BannerController::class,'banner_edit'])->name('banner_edit');
Route::post('/banner/update/{id}', [BannerController::class,'banner_update'])->name('banner_update');
Route::get('/banner/delete/{id}', [BannerController::class,'banner_delete'])->name('banner_delete');

Route::get('/offer-banner', [OfferBannerController::class,'offer_banner_add'])->name('offer_banner_add');
Route::post('/offer-banner/add', [OfferBannerController::class,'offer_banner_create'])->name('offer_banner_create');
Route::get('/offer-banner/show', [OfferBannerController::class,'offer_banner_show'])->name('offer_banner_show');
Route::get('/offer-banner/edit/{id}', [OfferBannerController::class,'offer_banner_edit'])->name('offer_banner_edit');
Route::post('/offer-banner/update/{id}', [OfferBannerController::class,'offer_banner_update'])->name('offer_banner_update');
Route::get('/offer-banner  /delete/{id}', [OfferBannerController::class,'offer_banner_delete'])->name('offer_banner_delete');


Route::get('/', [HomeController::class,'index'])->name('home');

//cart practies


Route::get('/shopping-cart', [CartController::class, 'ProductCart'])->name('shopping.cart');
Route::get('/book/{id}', [CartController::class, 'addproductCart'])->name('addproduct.to.cart');
Route::post('/cart/increment/{id}', [CartController::class, 'incrementCartItem'])->name('cart.increment');
Route::post('/cart/decrement/{id}', [CartController::class, 'decrementCartItem'])->name('cart.decrement');
Route::patch('/update-shopping-cart', [CartController::class, 'update'])->name('update-cart');
Route::delete('/delete-cart-product', [CartController::class, 'deleteProduct'])->name('delete.cart.product');













Route::any('category/create', [CategoryController::class, 'createCategory'])->name('createCategory');
Route::get('categories', [CategoryController::class, 'allCategories'])->name('allCategories');
Route::any('category/edit/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');
Route::get('category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');


//product

Route::get('/product', [ProductController::class,'create'])->name('product');
Route::post('/product/create', [ProductController::class,'store'])->name('product_create');
Route::get('/product/show', [ProductController::class,'index'])->name('product_show');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product_edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product_update');
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product_delete');
