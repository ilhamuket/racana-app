<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;

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




//auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//dashboard 
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


Route::prefix('article')->middleware('auth')->group(function () {
    Route::get('/list', [ArticleController::class,  'list'])->name('article.list');
    Route::get('/create', [ArticleController::class,  'create'])->name('article.create');
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/update/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::get('/publish/{id}', [ArticleController::class, 'publish'])->name('article.publish');
    Route::get('/index', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/show/{id}', [ArticleController::class, 'showPanitia'])->name('article.show');
    Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
});
