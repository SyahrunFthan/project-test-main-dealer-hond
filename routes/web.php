<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth')->group(function(){
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('home-admin', [AdminController::class, 'index'])->middleware('roleUser:1');
    Route::resource('product-admin', ProductController::class)->middleware('roleUser:1');
    Route::get('/kategori', [KategoriController::class, 'index'])->middleware('roleUser:1');
    Route::post('/kategori', [KategoriController::class, 'store'])->middleware('roleUser:1');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->middleware('roleUser:1');
    Route::post('home/add-cart', [HomeController::class, 'addCart'])->name('addCart');
    Route::get('/home/show-modal', [HomeController::class, 'showModal'])->name('showModal');
    Route::delete('/home/delete/{id}', [HomeController::class, 'delete']);
    Route::get('/home/show-modal-confirm', [HomeController::class, 'showModalConfirm']);
    Route::post('/home/create', [HomeController::class, 'createTransaksi']);
    Route::get('/home/data-temp', [HomeController::class, 'getData']);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('roleUser:2');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('auth');
    Route::get('register', [LoginController::class, 'register'])->name('register');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('create', [LoginController::class, 'create'])->name('create');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');

