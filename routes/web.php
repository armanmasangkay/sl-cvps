<?php

use App\Models\Person;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminReportsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\VaccinatorController;
use App\Http\Controllers\VaccinatorRegistrationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\EncoderController;
use App\Http\Controllers\PostVaxController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserLogin;
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

Route::middleware(['auth'])->group(function () {
    Route::resource('admin', AdminController::class);
    Route::resource('facility', FacilityController::class);
    Route::resource('encoder', EncoderController::class);
    Route::resource('vaccine', VaccineController::class);
    Route::resource('vaccinator',VaccinatorController::class);
    Route::resource('administrator', SuperAdminController::class);
    Route::get('/reports', [ReportsController::class, 'index'])->name('superadmin.reports');
    Route::get('/admin/reports',[AdminReportsController::class,'index'])->name('admin.reports');
    Route::get('/post-vax',[PostVaxController::class,'index'])->name('encoder.post-vax');
});


Route::get('/register', [RegistrationController::class, 'view'])->name('person.register');
Route::post('/register', [RegistrationController::class, 'store']);
Route::get('/login',[UserLogin::class,'view'])->name('user.login');
Route::post('/login',[UserLogin::class,'authenticate']);


