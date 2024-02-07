<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\atsController;


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

Auth::routes();

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');


// Resourceful route for 'sekolahs' with custom update method
Route::resource('sekolahs', SekolahController::class)->middleware('auth');
Route::post('/sekolahs/{id}', [SekolahController::class, 'update'])->name('sekolahs.update');

// Home route for authenticated users
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/get-kecamatan-data', [HomeController::class, 'getKecamatanData']);

// Resourceful route for 'ats' and individual views for polyline, polygon, and circle
Route::resource('ats', atsController::class)->middleware('auth');
Route::get('/polyline', function () {
    return view('ats.polyline');
})->name('polyline');
Route::get('/polygon', function () {
    return view('ats.polygon');
})->name('polygon');
Route::get('/circle', function () {
    return view('ats.circle');
})->name('circle');
