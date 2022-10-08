<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::controller(FrontController::class)->group(function (){

    Route::get('/','index')->name('home');
    Route::get('/about','about')->name('about');
    Route::get('/all_courses','all_courses')->name('all_courses');
    Route::get('/trainers','trainers')->name('trainers');
    Route::get('/events','events')->name('events');
    Route::get('/pricing','pricing')->name('pricing');
    Route::get('/details/{id?}','details')->name('details');


});


