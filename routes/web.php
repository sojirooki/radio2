<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [TimelineController::class, 'index']);
    Route::get('/timelines/create', [TimelineController::class, 'create']);
    Route::get('/timelines/{timeline}', [TimelineController::class , 'show']);
    Route::post('/timelines', [TimelineController::class, 'store']);
    Route::get('/timelines/{timeline}/edit', [TimelineController::class, 'edit']);
    Route::put('/timelines/{timeline}', [TimelineController::class, 'update']);
});

require __DIR__.'/auth.php';
