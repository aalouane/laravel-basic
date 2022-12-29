<?php

use App\Http\Controllers\Demo\DemoController;
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

Route::controller(DemoController::class)->group(function(){
    Route::get('/about', 'about')->name('about.page')->middleware('check.age');
    Route::get('/contact', 'contact')->name('contact.page');
});