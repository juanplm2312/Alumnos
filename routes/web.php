<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\AlumnoController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

////////////

    
    Route::resource('alumnos', AlumnoController::class)->names([
        'index' => 'alumno.index',
        'create' => 'alumno.create',
        'store' => 'alumno.store',
        'show' => 'alumno.show',
        'edit' => 'alumno.edit',
        'update' => 'alumno.update',
        'destroy' => 'alumno.destroy',
    ]);

////////////

Route::get('/alumnos/reset-ids', [AlumnoController::class, 'resetIds'])->name('alumno.resetIds');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
