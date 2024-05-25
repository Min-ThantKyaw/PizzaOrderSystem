<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

//Login & Register
Route::middleware('admin_auth')->group(function () {
    Route::redirect('/', 'loginPage');
    Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
    Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
});


Route::middleware(['auth'])->group(function () {

    //Dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    //Category
    Route::middleware('admin_auth')->prefix('/category')->group(function () {
        Route::get('/list', [CategoryController::class, 'list'])->name('category#listPage');
        Route::get('/createPage', [CategoryController::class, 'createPage'])->name('category#createPage');
        Route::post('/create', [CategoryController::class, 'create'])->name('category#create');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
        Route::post('/update', [CategoryController::class, 'update'])->name('category#update');
    });

    //Admin
    //Password Chane
    Route::middleware('admin_auth')->group(function () {
        Route::get('/password/changePage', [AuthController::class, 'adminPasswordChange'])->name('admin#passwordChangePage');
        Route::post('change/password', [AuthController::class, 'changePassword'])->name('admin#changePassword');
    });
    //Account profile
    Route::get('/account/details', [AdminController::class, 'details'])->name('admi#detail');
    //Account Edit
    Route::get('account/edit', [AdminController::class, 'edit'])->name('admin#edit');
    //User Login
    Route::middleware('user_auth')->prefix('user')->group(function () {
        Route::get('home', function () {
            return view('user.home');
        })->name('user#home');
    });
});
