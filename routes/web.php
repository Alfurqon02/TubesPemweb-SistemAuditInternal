<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeriodeAuditController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UnitAuditController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page.index');
})->name('landing');

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'loginSubmit'])->name('login.submit');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::middleware(['auth'])->group(function () {

     // Account
    Route::get('/account', [AccountController::class, 'showAccount'])->name('account');
    
     // Profile
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');

    // Profile
    Route::get('/task', [ProfileController::class, 'showTask'])->name('task');
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    // Setup Audit
    Route::get('/setup-audit', function () {
        return view('setup.index');
    })->name('setup-audit');

    // Setup Periode
    Route::resource('/setup-audit/setup-periode', PeriodeAuditController::class);
    Route::get('/setup-audit/setup-periode/{setup_periode}/download', [PeriodeAuditController::class, 'download'])->name('setup-periode-download');

    // Setup Unit
    Route::resource('/setup-audit/setup-unit', UnitAuditController::class);
});