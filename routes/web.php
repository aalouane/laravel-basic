<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\HomeSliderController;

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

// Frontend Routes
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('/', function () {
    return view('frontend.index');
});


// End Frontend Routes
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



// Backend Routes
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');

    Route::get('/edit/profile', 'editProfile')->name('profile.edit');
    Route::post('/store/profile', 'storeProfile')->name('profile.store');

    Route::get('/change/password', 'changePassword')->name('change.password');
    Route::post('/update/password', 'updatePassword')->name('update.password');
});


Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slider', 'homeSlider')->name('home.slide');
});



// End Backend Routes
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




// Route::middleware('auth')->group(function () {
//     // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
