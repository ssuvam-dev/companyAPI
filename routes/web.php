<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('index');
})->name('home');



Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return view('index');
})->name('logoutuser');

Route::get('/company/register',[CompanyController::class,'showregisterCompany'])->name('showregisterCompany');
