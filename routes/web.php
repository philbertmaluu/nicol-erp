<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProxyController;
use App\Http\Controllers\ShareholderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('Home.index');
// });

Route::get('/', [LandingController::class, 'index']);
Route::get('home', [LandingController::class, 'redirect'])->middleware([]);
// Route::resource('home', HomeController::class)->middleware([
//     'index' => 'auth', 'create' => 'auth', 'store' => 'auth', 'edit' => 'auth', 'show' => 'auth',
// ]);
Route::resource('event', EventController::class)->middleware(['index' => 'auth', 'store' => 'auth', 'edit' => 'auth']);
Route::resource('proxy', ProxyController::class)->middleware(['index' => 'auth', 'store' => 'auth', 'edit' => 'auth', 'create' => 'auth']);
Route::resource('shareholder', ShareholderController::class)->middleware(['index' => 'auth', 'store' => 'auth', 'edit' => 'auth', 'create' => 'auth']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
