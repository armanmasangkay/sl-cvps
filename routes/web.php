<?php

use App\Models\Person;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReportsController;
use App\Models\Vaccination;
use Illuminate\Support\Facades\Route;

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


Route::resource('admin', AdminController::class);

Route::get('/register', [RegistrationController::class, 'view'])->name('person.registration');

Route::resource('admin', AdminController::class);

Route::get('/reports',[ReportsController::class,'index'])->name('superadmin.reports');