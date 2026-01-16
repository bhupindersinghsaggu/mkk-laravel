<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Models\News;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home page with latest news
Route::get('/', function () {
    $latestNews = News::latest()->take(3)->get();
    return view('website.home', compact('latestNews'));
})->name('home');

// Public news page
Route::get('/news', function () {
    $news = News::latest()->paginate(10);
    return view('website.news', compact('news'));
})->name('public.news');

// Public gallery
Route::get('/gallery', [GalleryController::class, 'index'])
    ->name('gallery');

// Admission enquiry form submit
Route::post('/admission-enquiry', [AdmissionController::class, 'store'])
    ->name('admission.store');


/*
|--------------------------------------------------------------------------
| Authenticated Routes (ALL logged-in users)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Dashboard (shared)
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

    // Admissions (admin full access)
    Route::get('/dashboard/admissions', [AdmissionController::class, 'index'])
        ->name('admissions.index');

    Route::patch('/dashboard/admissions/{admission}/status',
        [AdmissionController::class, 'updateStatus'])
        ->name('admissions.status');

    Route::delete('/dashboard/admissions/{admission}',
        [AdmissionController::class, 'destroy'])
        ->name('admissions.destroy');

    // News (admin)
    Route::get('/dashboard/news', [NewsController::class, 'index'])
        ->name('news.index');

    Route::get('/dashboard/news/create', [NewsController::class, 'create'])
        ->name('news.create');

    Route::post('/dashboard/news', [NewsController::class, 'store'])
        ->name('news.store');

    Route::delete('/dashboard/news/{news}', [NewsController::class, 'destroy'])
        ->name('news.destroy');

    // Gallery (admin)
    Route::get('/dashboard/gallery', [GalleryController::class, 'admin'])
        ->name('admin.gallery');

    Route::post('/dashboard/gallery', [GalleryController::class, 'store'])
        ->name('admin.gallery.store');
});


/*
|--------------------------------------------------------------------------
| Staff Routes (Read-only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:staff'])->group(function () {

    Route::get('/dashboard/staff', function () {
        return view('dashboard.staff');
    })->name('staff.dashboard');

    // Staff can view admissions (read-only)
    Route::get('/dashboard/staff/admissions',
        [AdmissionController::class, 'index'])
        ->name('staff.admissions.index');
});


require __DIR__ . '/auth.php';
