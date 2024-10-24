<?php

use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ProfileController;
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
Route::get('razas/{tipo}' , [MascotaController::class , 'getRazaPorTipo']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('dashboard/mascotas/create',[MascotaController::class,'create'])->name('mascotas.create');
Route::post('dashboard/mascotas',[MascotaController::class,'store'])->name('mascotas.store');
require __DIR__.'/auth.php';
Route::get('mascotas/create', [MascotaController::class, 'create'])->name('mascotas.create');
Route::get('mascotas/edit', [MascotaController::class, 'edit'])->name('mascotas.edit');
Route::get('/mascotas/create/getRazaPorTipo/{tipos}', [MascotaController::class, 'getRazaPorTipo']);
