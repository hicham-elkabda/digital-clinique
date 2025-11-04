<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationRdvController;
use App\Http\Controllers\RendezVousController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('docteur.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/RendezVous-Reserver', [ReservationRdvController::class, 'index'])->name('rdvReserver');
    Route::get('/RendezVous-Reserver/create', [ReservationRdvController::class, 'create'])->name('rdvReserver.store');
    Route::post('/rdv/checkAvailability', [RendezVousController::class, 'checkAvailability'])->name('rdv.checkAvailability');

});


require __DIR__ . '/auth.php';
