<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdmissionController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('website.home');
});

Route::post('/admission-enquiry', [AdmissionController::class, 'store'])
    ->name('admission.store');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (ALL Logged-in Users)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Dashboard (IMPORTANT: NO ROLE HERE)
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard/admissions', [AdmissionController::class, 'index'])
        ->name('admissions.index');
    // ✅ Update status
    Route::patch('/dashboard/admissions/{admission}/status', [AdmissionController::class, 'updateStatus'])
        ->name('admissions.status');

    // ✅ Delete enquiry
    Route::delete('/dashboard/admissions/{admission}', [AdmissionController::class, 'destroy'])
        ->name('admissions.destroy');
});

/*
|--------------------------------------------------------------------------
| Staff Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:staff'])->group(function () {

    Route::get('/dashboard/staff', function () {
        return view('dashboard.staff');
    })->name('staff.dashboard');

    // ✅ ADD THIS
    Route::get('/dashboard/staff/admissions', [AdmissionController::class, 'index'])
        ->name('staff.admissions.index');
});


require __DIR__ . '/auth.php';
