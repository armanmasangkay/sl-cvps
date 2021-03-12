<?php

use App\Models\Person;
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


Route::get('/reports',function(){

    $vaccinateds=[];

    foreach (Person::all() as $person){
        if($person->isVaccinated()){
            $vaccinateds=$person;
        }
    }
    return view('pages.superadmin.reports',[
        'vaccinateds'=>$vaccinateds
    ]);

})->name('superadmin.reports');
