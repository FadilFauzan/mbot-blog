<?php

use App\Http\Controllers\DashboardProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PasswordController;



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

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
        'active' => 'home'
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'active' => 'about',
        'name' => 'Fadil Ahmad Fauzan'
    ]);
})->name('about');

Route::get('/posts', [PostController::class, 'index'])->name('blog');
Route::get('/post/{post:slug}', [PostController::class, 'show']); // routes model binding

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

// Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);
// Route::get('/authors/{author:username}', [PostController::class, 'author']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

// Google OAuth
Route::get('/auth/google', [SocialAuthController::class, 'googleRedirect'])->name('google.login');
Route::get('/auth/google/callback', [SocialAuthController::class, 'googleCallback'])->name('google.callback');
// Facebook OAuth
Route::get('/auth/facebook', [SocialAuthController::class, 'facebookRedirect'])->name('facebook.login');
Route::get('/auth/facebook/callback', [SocialAuthController::class, 'facebookCallback']);

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::get('/forgot-password', [PasswordController::class, 'index'])
    ->middleware('guest')->name('password-request');
Route::post('/forgot-password', [PasswordController::class, 'passwordEmail'])
    ->middleware('guest')->name('password-email');

Route::get('/reset-password/{token}', [PasswordController::class, 'resetPassword'])
    ->middleware('guest')->name('password.reset');
Route::post('/reset-password', [PasswordController::class, 'passwordVerify'])
    ->middleware('guest')->name('password.update');


Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/profile', DashboardProfileController::class)->middleware('auth');

Route::get('dashboard/change-password', [PasswordController::class, 'changePassword'])
    ->middleware('auth');
Route::post('dashboard/change-password', [PasswordController::class, 'processChangePassword'])
    ->middleware('auth')->name('password.change');

// Admin
Route::resource('/dashboard/admin/users', AdminUserController::class)->except('show', 'create');
Route::resource('/dashboard/admin/posts', AdminPostController::class)->except('edit', 'create');
Route::resource('/dashboard/admin/categories', AdminCategoryController::class);
