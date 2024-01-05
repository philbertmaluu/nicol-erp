<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProxyController;
use App\Http\Controllers\ShareholderController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProxyAttendanceController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\vottingController;


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
Route::get('attendant/mark-attendance/{eventId}/{eventName}', [AttendanceController::class, 'markAttendance'])->name('attendant.markAttendance');
Route::resource('attendant', AttendanceController::class)->middleware(['index' => 'auth', 'store' => 'auth', 'proxy' => 'auth', 'edit' => 'auth', 'create' => 'auth']);
Route::resource('proxyAttendance', ProxyAttendanceController::class)->middleware(['index' => 'auth', 'store' => 'auth', 'proxy' => 'auth', 'edit' => 'auth', 'create' => 'auth']);
Route::get('records/eventRecord/{eventId}/{eventName}', [RecordController::class, 'records'])->name('records.eventRecord');
Route::resource('records', RecordController::class)->middleware(['index' => 'auth', 'store' => 'auth', 'edit' => 'auth', 'create' => 'auth']);
Route::resource('votting', vottingController::class)->middleware(['index' => 'auth', 'store' => 'auth', 'edit' => 'auth', 'create' => 'auth']);
// Route::post('events/{id}/update-status', [RecordController::class, 'updateStatus'])->name('event.updateStatus');
Route::post('/events/{id}/update-status', [RecordController::class, 'updateStatus'])->name('events.updateStatus');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
