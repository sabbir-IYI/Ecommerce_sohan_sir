<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;

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

// auth route start here
Auth::routes();

// auth route end here

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('category/details/{slug}', [FrontendController::class, 'category_details'])->name('category.details');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('profile', [HomeController::class, 'profile'])->name('profile');
Route::post('change/name', [HomeController::class, 'change_name'])->name('change_name');
Route::post('change/pasword', [HomeController::class, 'change_password'])->name('change_password');

Route::delete('category/hard/delete/{id}', [CategoryController::class, 'harddelete'])->name('category.harddelete');
Route::resource('category', CategoryController::class);

Route::resource('subcategory', SubcategoryController::class);
Route::delete('subcategory/hard/delete/{id}', [SubcategoryController::class, 'harddelete'])->name('subcategory.harddelete');

Route::resource('product', ProductController::class);
Route::delete('product/hard/delete/{id}', [ProductController::class, 'harddelete'])->name('product.harddelete');
