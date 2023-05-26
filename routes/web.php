<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
Route::get('/about', [HomeController::class, 'about']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/categori', [HomeController::class, 'categori']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/details', [HomeController::class, 'details']);
Route::get('/elements', [HomeController::class, 'elements']);
Route::get('/latest-news', [HomeController::class, 'latestNews']);
Route::get('/single-blog', [HomeController::class, 'singleBlog']);

//auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//dashboard 
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
