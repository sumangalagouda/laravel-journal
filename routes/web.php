<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;
use App\Models\Journal;

Route::get('/', function () {
    if (auth()->check()) {
        $journals = Journal::where('user_id', auth()->id())->get();
        return view('home', compact('journals'));
    } else {
        return view('home')->with('journals', collect()); // pass empty collection for guests
    }
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/journals/analytics', [JournalController::class, 'moodAnalytics'])->name('journals.analytics');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('journals', JournalController::class)->middleware('auth');
require __DIR__.'/auth.php';
