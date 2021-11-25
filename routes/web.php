<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\QRCodeController;

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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/custom-signin', [AuthController::class, 'createSignin'])->name('signin.custom');


Route::get('/register', [AuthController::class, 'signup'])->name('register');
Route::post('/create-user', [AuthController::class, 'customSignup'])->name('user.registration');


Route::get('/dashboard', [DataController::class, 'index']);
Route::post('/dashboard', [DataController::class, 'store'])->name('store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('qrcode/{id}', [DataController::class, 'generate'])->name('generate');
Route::get('qr-code', [QRCodeController::class, 'index'])->name('QRCode.index');