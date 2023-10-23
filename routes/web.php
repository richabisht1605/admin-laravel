<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//view all the files
Route::get('/', [ViewController::class,'index'])->name('login');
Route::get('/page-summary',[ViewController::class,'pagesummary'])->name('page_summary');
Route::get('/add-page', [ViewController::class,'addpage'])->name('add_page');
Route::get('/category-summary',[ViewController::class,'categorysummary'])->name('category_summary');
Route::get('/add-category', [ViewController::class,'addcategory'])->name('add_category');
Route::get('/product-summary', [ViewController::class,'productsummary'])->name('product_summary');
Route::get('/add-product', [ViewController::class,'productadd'])->name('product_add');
Route::get('/change-password',[ViewController::class,'changepassword'])->name('change_password');

Route::post('/postLogin',[AuthController::class,'postLogin'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/insert-page',[CrudController::class,'insert_page'])->name('insert.page');
Route::get('delete-data/{id}',[CrudController::class,'delete_data_page']);
Route::get('edit-data/{id}',[CrudController::class,'edit_display_page']);
Route::post('/page-summary',[CrudController::class,'search_page'])->name('search.page');

Route::post('/insert-category',[CrudController::class,'insert_category'])->name('insert.category');
Route::get('delete-data-category/{id}',[CrudController::class,'delete_data_category']);
Route::get('edit-data-category/{id}',[CrudController::class,'edit_display_category']);
Route::post('/category-summary',[CrudController::class,'search_category'])->name('search.category');

Route::post('/insert-product',[CrudController::class,'insert_product'])->name('insert.product');
Route::get('delete-data-product/{id}',[CrudController::class,'delete_data_product']);
Route::get('edit-data-product/{id}',[CrudController::class,'edit_data_product']);
Route::post('edit-product/{id}',[CrudController::class,'edit_product']);
Route::post('/product-summary',[CrudController::class,'search_product'])->name('search.product');

Route::post('changepassword',[CrudController::class,'change_password']);