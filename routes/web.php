<?php

use App\Http\Controllers\ActivateController;
use App\Http\Controllers\ProfileController;
use App\Mail\ActivationCodeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    if (Auth::user() && Auth::user()->stats == "active" && Auth::user()->stats == "owner") {
        return view('dashboard');
    } elseif (Auth::user() && Auth::user()->stats != "active" && Auth::user()->stats != "owner") {
        return view('user.notactive');
    }
})->middleware("notactive");
Route::post("/active/store", [ActivateController::class, "store"])->name("active");
Route::get('/about', function () {
    return view('about');
});
Route::get('/requests', function () {
    if (Auth::user()->hasrole("admin")) {
        return view('admin.approve');
    } else {
        return view('dashboard');
    }
});


Route::put("/requests/{user}", [ActivateController::class, "update"])->name("user.update");
Route::get('/notactive', function () {
    if (Auth::user()->stats != "active") {
        return view('user.notactive');
    } else {
        return view('dashboard');
    }
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', "notactive"])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
