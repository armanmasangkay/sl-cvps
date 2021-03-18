<?php

use App\Http\Controllers\ActsPersonController;
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
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostVaxController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\PreRegisteredController;
use App\Http\Controllers\NewDataController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\SearchPreRegistrationController;
use App\Http\Controllers\SetupControlller;
use App\Http\Controllers\UserLogin;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\RouteRedirectAfterChangePasswordController;
use App\Http\Controllers\DeveloperController;
use App\Models\ActsPerson;
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

Route::get('/',function(){
    return redirect(route('user.login'));
});

Route::middleware(['auth'])->group(function () {
    Route::resource('admin', AdminController::class);
    Route::resource('facility', FacilityController::class);
    Route::resource('encoder', EncoderController::class);
    Route::resource('vaccine', VaccineController::class);
    Route::resource('vaccinator',VaccinatorController::class);
    Route::resource('administrator', SuperAdminController::class);
    Route::resource('pre', PreRegisteredController::class);
    Route::resource('change-password', ChangePasswordController::class);
    Route::resource('check-route', RouteRedirectAfterChangePasswordController::class);
    Route::resource('developer', DeveloperController::class);
    Route::get('/reports/superadmin', [ReportsController::class, 'index'])->name('reports.superadmin');
    Route::get('/reports/admin',[AdminReportsController::class,'index'])->name('reports.admin');
    Route::get('/post-vax/{person}/',[PostVaxController::class,'index'])->name('encoder.post-vax');
    Route::post('/post-vax',[PostVaxController::class, 'store'])->name('postvax.store');
    Route::get('/logout',[LogoutController::class,'logout'])->name('user.logout');


    Route::post('/checkqr', [ActsPersonController::class, 'checkQrCode'])->name('qr.check');
    Route::get('/detail', [ActsPersonController::class, 'details'])->name('qr.detail');
    Route::post('/senddata', [ActsPersonController::class, 'apidata']);
    Route::post('/addqr', [PersonController::class, 'addqr'])->name('qr.add');
    
    Route::get('/search-pre-reg',[SearchPreRegistrationController::class,'search'])->name('search.pre-registered');
});


Route::get('/init',[SetupControlller::class,'init'])->name('init');
Route::get('/register', [RegistrationController::class, 'view'])->name('person.register');
Route::post('/register', [RegistrationController::class, 'store']);
Route::get('/login',[UserLogin::class,'view'])->name('user.login');
Route::post('/login',[UserLogin::class,'authenticate']);


