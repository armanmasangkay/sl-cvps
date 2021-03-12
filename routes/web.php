<?php

<<<<<<< HEAD
use App\Http\Controllers\AdminController;
=======
use App\Http\Controllers\RegistrationController;
>>>>>>> 04fef21bdf725dfef2da682915d4c9308b1d9cc5
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

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD

Route::resource('admin', AdminController::class);

=======
Route::get('/register', [RegistrationController::class, 'view'])->name('person.registration');

Route::get('/reports',function(){

    return view('pages.superadmin.reports');

})->name('superadmin.reports');
>>>>>>> 04fef21bdf725dfef2da682915d4c9308b1d9cc5
