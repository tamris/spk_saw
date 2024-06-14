<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AlternatifKriteriaController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CripsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SAWController;
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
    return view('login');
});

// Register and Verify
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Login & Logout
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Home & Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Email Verification
Route::get('/email/verify', [EmailVerificationController::class, 'show'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/resend', [EmailVerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// Password Forgot & Reset
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])
    ->middleware('guest')
    ->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
    ->middleware('guest')
    ->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPassword'])
    ->middleware('guest')
    ->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->middleware('guest')->name('password.update');

// Socialite
Route::get('/auth/redirect', [SocialiteController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);


Route::resource('alternatif',AlternatifController::class);
Route::resource('kriteria', KriteriaController::class);
Route::post('/kriteria/{kriteria}/crips', [CripsController::class, 'store'])->name('crips.store');
// Route::put('crips/{id}', [CripsController::class, 'update'])->name('crips.update');
Route::delete('crips/{id}', [CripsController::class, 'destroy'])->name('crips.destroy');
Route::get('/kriteria/{kriteria}/crips/{crip}/edit', [CripsController::class, 'edit'])->name('crips.edit');
Route::put('/kriteria/{kriteria}/crips/{crip}', [CripsController::class, 'update'])->name('crips.update');
// Route::resource('kriteria.crips', CripsController::class);

// Route::get('alternatif_kriterias', [AlternatifKriteriaController::class, 'index'])->name('alternatif_kriterias.index');
Route::resource('alternatif_kriterias', AlternatifKriteriaController::class);
// Route::get('/crips/by-kriteria/{kriteria_id}', [CripsController::class, 'getCripsByKriteria']);
// Route::get('alternatif_kriterias', [AlternatifKriteriaController::class, 'index'])->name('alternatif_kriterias.index');
// Route::get('alternatif_kriterias/create', [AlternatifKriteriaController::class, 'create'])->name('alternatif_kriterias.create');
// Route::post('alternatif_kriterias', [AlternatifKriteriaController::class, 'store'])->name('alternatif_kriterias.store');
// Route::get('alternatif_kriterias/{id}/edit', [AlternatifKriteriaController::class, 'edit'])->name('alternatif_kriterias.edit');
// Route::put('alternatif_kriterias/{id}', [AlternatifKriteriaController::class, 'update'])->name('alternatif_kriterias.update');
// Route::delete('alternatif_kriterias/{id}', [AlternatifKriteriaController::class, 'destroy'])->name('alternatif_kriterias.destroy');


// Route::get('/alternatif_kriteria/create', [AlternatifKriteriaController::class, 'create'])->name('alternatif_kriteria.create');
// Route::post('/alternatif_kriteria/load-crips', [AlternatifKriteriaController::class, 'loadCrips'])->name('alternatif_kriteria.load-crips');

Route::get('/saw/normalisasi', [SAWController::class, 'normalisasi'])->name('saw.normalisasi');