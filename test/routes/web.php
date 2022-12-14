<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContractController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/sim', [SimController::class,'index'])->middleware(['auth', 'verified'])->name('sim');
Route::get('/sim/add', [SimController::class,'getForm'])->middleware(['auth', 'verified'])->name('sim/add');
Route::post('/sim/save', [SimController::class,'store'])->middleware(['auth', 'verified'])->name('sim/save');
Route::get('/sim/{id}', [SimController::class,'show'])->middleware(['auth', 'verified']);
Route::get('/contracts', [ContractController::class,'index'])->middleware(['auth', 'verified'])->name('contracts');

// Route::get('/contracts/add', function () {
//     Gate::authorize('viev-contracts');
//     return view('form_contract');
// })->middleware(['auth', 'verified'])->name('contracts/add');
Route::get('/contracts/add', [ContractController::class,'getForm'])->middleware(['auth', 'verified'])->name('contracts/add');
Route::post('/contract/save', [ContractController::class,'store'])->middleware(['auth', 'verified'])->name('contracts/save');





require __DIR__.'/auth.php';
