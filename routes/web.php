<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\HomeController;
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

// Route::get('/dashboard', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'loginView'])->name('login');
Route::get('/register', [HomeController::class, 'registerView'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.admin');
Route::post('/register', [AuthController::class, 'register'])->name('register.user');


Route::middleware(['checkRole:admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashhboard.admin');
    Route::get('/management-user/{page?}/{limit?}', [HomeController::class, 'managementUser'])->name('managementuser.admin');
    Route::get('/management-product/{page?}/{limit?}', [HomeController::class, 'managementProduct'])->name('managementproduct.admin');

    // User Controller
    Route::post('/create-user', [UserController::class, 'create'])->name('createuser.admin');
    Route::post('/update-user', [UserController::class, 'update'])->name('updateuser.admin');

    // Product Controller
    Route::post('/create-product', [ProductController::class, 'create'])->name('createproduct.admin');
    Route::post('/update-product', [ProductController::class, 'update'])->name('updateproduct.admin');
});
