<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DetailAuditController;
use App\Http\Controllers\DetailAuditorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SetupAuditController;
use App\Http\Controllers\TimAuditorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('landing');

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'loginSubmit'])->name('login.submit');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Blocked
Route::get('/blocked', function () {
    return view('blocked.index');
})->name('blocked')->middleware('auth');

Route::middleware(['auth', 'role:guests'])->group(function () {
    // Account
    Route::get('/account', [AccountController::class, 'showAccount'])->name('account');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    
    // Task
    Route::get('/task', [ProfileController::class, 'showTask'])->name('task');
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
});

Route::middleware(['auth', 'role:administrator'])->group(function () {
    // Setup Audit
    Route::resource('/setup-audit', SetupAuditController::class);
    Route::get('/setup-audit/{setup_audit}/download', [SetupAuditController::class, 'download'])->name('setup-audit.download');
    Route::resource('/setup-audit/{setup_audit}/detail', DetailAuditController::class);
});

Route::middleware(['auth', 'role:ketua_auditor'])->group(function () {
    // Input Auditor
    Route::resource('/input-auditor', TimAuditorController::class);
});

Route::middleware(['auth', 'role:auditor'])->group(function () {
    // Auditor Index
    Route::get('/auditor', function () {
        return view('auditor.index');
    })->name('auditor.index');
});

Route::middleware(['auth', 'role:auditee'])->group(function () {
    // Auditee Index
    Route::get('/auditee', function () {
        return view('auditee.index');
    })->name('auditee.index');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');