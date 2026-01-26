<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;

use App\Models\News;
use App\Models\Event;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// ✅ Home Page (Latest News + Latest 4 Events)
Route::get('/', function () {
    $latestNews   = News::latest()->take(3)->get();
    $latestEvents = Event::orderBy('event_date', 'desc')->take(4)->get();
   
    return view('website.home', compact('latestNews', 'latestEvents'));
})->name('home');


// ✅ Public News Page
Route::get('/news', function () {
    $news = News::latest()->paginate(10);
    return view('website.news', compact('news'));
})->name('public.news');


// ✅ Public Events List Page (ALL EVENTS)
Route::get('/events', function () {
    $events = Event::orderBy('event_date', 'desc')->paginate(12);
    return view('website.events.index', compact('events'));
})->name('events.public');


// ✅ Event Detail Page
Route::get('/events/{event}', [EventController::class, 'show'])
    ->name('events.show');


// ✅ Public Gallery
Route::get('/gallery', [GalleryController::class, 'index'])
    ->name('gallery');


// ✅ Admission Enquiry
Route::post('/admission-enquiry', [AdmissionController::class, 'store'])
    ->name('admission.store');


/*
|--------------------------------------------------------------------------
| Authenticated Routes (All logged-in users)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

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

    // Admissions
    Route::get('/dashboard/admissions', [AdmissionController::class, 'index'])
        ->name('admissions.index');

    Route::patch('/dashboard/admissions/{admission}/status',
        [AdmissionController::class, 'updateStatus']
    )->name('admissions.status');

    Route::delete('/dashboard/admissions/{admission}',
        [AdmissionController::class, 'destroy']
    )->name('admissions.destroy');


    // News
    Route::get('/dashboard/news', [NewsController::class, 'index'])
        ->name('news.index');

    Route::get('/dashboard/news/create', [NewsController::class, 'create'])
        ->name('news.create');

    Route::post('/dashboard/news', [NewsController::class, 'store'])
        ->name('news.store');

    Route::delete('/dashboard/news/{news}', [NewsController::class, 'destroy'])
        ->name('news.destroy');


    // Events / Achievements
    Route::get('/dashboard/events', [EventController::class, 'index'])
        ->name('events.index');

    Route::post('/dashboard/events', [EventController::class, 'store'])
        ->name('events.store');

    Route::get('/dashboard/events/{event}/edit', [EventController::class, 'edit'])
        ->name('events.edit');

    Route::put('/dashboard/events/{event}', [EventController::class, 'update'])
        ->name('events.update');

    Route::delete('/dashboard/events/{event}', [EventController::class, 'destroy'])
        ->name('events.destroy');
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

    Route::get('/dashboard/staff/admissions',
        [AdmissionController::class, 'index']
    )->name('staff.admissions.index');
});

require __DIR__ . '/auth.php';
