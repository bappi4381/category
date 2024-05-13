<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannerController;

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


Route::get('/home', [HomeController::class,'index'])->name('home');
Route::any('category/create', [CategoryController::class, 'createCategory'])->name('createCategory');
Route::get('categories', [CategoryController::class, 'allCategories'])->name('allCategories');
Route::any('category/edit/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');
Route::get('category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
