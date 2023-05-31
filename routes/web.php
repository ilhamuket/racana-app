<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftarController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

//home
Route::get('/', [HomeController::class, 'index']);
Route::get('/mars', [HomeController::class, 'mars'])->name('mars');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/logo', [HomeController::class, 'logo'])->name('logo');
Route::get('/lokasi', [HomeController::class, 'lokasi'])->name('lokasi');
Route::get('/tekpram', [HomeController::class, 'tekpram'])->name('tekpram');
Route::get('/proker', [HomeController::class, 'proker'])->name('proker');
Route::get('/bidang', [HomeController::class, 'bidang'])->name('bidang');
Route::get('/kir', [HomeController::class, 'kir'])->name('kir');
Route::get('/fbs', [HomeController::class, 'fbs'])->name('fbs');
Route::get('/kelompok', [HomeController::class, 'kelompok'])->name('kelompok');
Route::get('/join', [HomeController::class, 'join'])->name('join');
Route::post('/join', [HomeController::class, 'store'])->name('store');




//auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authLogin'])->name('authLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//dashboard 
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


Route::prefix('article')->middleware('auth')->group(function () {
    Route::get('/list', [ArticleController::class,  'list'])->name('article.list');
    Route::get('/create', [ArticleController::class,  'create'])->name('article.create');
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::post('/update/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::get('/publish/{id}', [ArticleController::class, 'publish'])->name('article.publish');
    Route::get('/delete/{id}', [ArticleController::class, 'delete'])->name('article.delete');
    Route::get('/index', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/show/{id}', [ArticleController::class, 'show'])->name('article.show');
    Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
});


Route::prefix('pendaftar')->middleware('auth')->group(function () {
    Route::get('/list', [PendaftarController::class,  'list'])->name('pendaftar.list');
    Route::get('/create', [PendaftarController::class,  'create'])->name('pendaftar.create');
    Route::get('/edit/{id}', [PendaftarController::class, 'edit'])->name('pendaftar.edit');
    Route::put('/update/{id}', [PendaftarController::class, 'update'])->name('pendaftar.update');
    Route::get('/publish/{id}', [PendaftarController::class, 'publish'])->name('pendaftar.publish');
    Route::get('/index', [PendaftarController::class, 'index'])->name('pendaftar.index');
    Route::get('/pendaftar/show/{id}', [PendaftarController::class, 'show'])->name('pendaftar.show');
    Route::post('/store', [PendaftarController::class, 'store'])->name('pendaftar.store');
});


Route::prefix('category')->middleware('auth')->group(function () {
    Route::get('/list', [CategoryController::class,  'list'])->name('category.list');
    Route::get('/create', [CategoryController::class,  'create'])->name('category.create');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/publish/{id}', [CategoryController::class, 'publish'])->name('category.publish');
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
});
