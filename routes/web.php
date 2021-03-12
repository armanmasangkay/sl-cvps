<?php

use App\Http\Controllers\RegistrationController;
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

Route::get('/register', [RegistrationController::class, 'render'])->name('person.registration');
Route::post('/register', [RegistrationController::class, 'store']);

Route::get('/reports',function(){

    return view('pages.superadmin.reports');

})->name('superadmin.reports');
