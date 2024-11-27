<?php
use App\Http\Controllers\acceptcoachController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ActivateController;
use App\Http\Controllers\CoachappController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Mail\ActivationCodeMail;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    if(!Auth::user()){
        return view('welcome');
    }
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
Route::get('/home', function () {
    return view('home');
});
Route::get('/requests', function () {
    if (Auth::user()->hasrole("admin")) {
        return view('admin.approve');
    } else {
        return view('dashboard');
    }
});







Route::resource('classes', ClassController::class);
Route::resource('coach-application', CoachappController::class);
Route::resource('coach-application/store', CoachappController::class);
Route::resource('coach-approve', acceptcoachController::class);
Route::resource('coach-approve/store', acceptcoachController::class);




Route::resource('classes/{class}/courses', CourseController::class);

Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
Route::get('/payment/create/{plan}', [PaymentController::class, 'createPaymentSession'])->name('payment.create');
Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');

Route::put("/requests/{user}", [ActivateController::class, "update"])->name("user.update");
Route::get('/notactive', function () {
    if (  Auth::user() ) {
        if(Auth::user()->stats != "active" && Auth::user()->stats != "owner"){
            return view('user.notactive');
        }

    } else {
        return view('welcome');
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
Route::get('/courses/{course}/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
Route::post('/courses/{course}/lessons', [LessonController::class, 'store'])->name('lessons.store');
Route::get('/{Course}/lessons', [LessonController::class, 'index'])->name('lessons.index');

Route::get('/{Course}/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
Route::put('/{Course}/lessons/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
Route::delete('/{Course}/lessons/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');

require __DIR__ . '/auth.php';
