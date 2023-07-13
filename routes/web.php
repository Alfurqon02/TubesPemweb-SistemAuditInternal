<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DetailAuditController;
use App\Http\Controllers\DetailAuditorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SetupAuditController;
use App\Http\Controllers\TimAuditorController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileSetupController;

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

// Blocked
Route::get('/blocked', function () {
    return view('blocked.index');
})->name('blocked')->middleware('auth');

// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Account
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/email', [AccountController::class, 'index'])->name('account.index');
    Route::get('/account/edit', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/account/update', [AccountController::class, 'update'])->name('account.update');
    Route::get('/account/password/edit', [AccountController::class, 'editPassword'])->name('account.password.edit');
    Route::put('/account/password/update', [AccountController::class, 'updatePassword'])->name('account.password.update');
    Route::put('/account/email/update', [AccountController::class, 'updateEmail'])->name('account.email.update');

    // Password
    // ...
});

// Profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

// Task
Route::get('/task', [ProfileController::class, 'showTask'])->name('task');

// API
Route::prefix('/api')->group(function () {
    Route::get('/users', [APIController::class, 'ApiUser']);
    Route::get('/audit', [APIController::class, 'ApiAudit']);
});

// Routes accessible to all roles
Route::middleware(['auth'])->group(function () {
    // Add your shared routes here
});

// Routes accessible to the administrator role
Route::middleware(['auth', 'role:administrator'])->group(function () {
    // Add your administrator-specific routes here
    Route::resource('/setup-audit', SetupAuditController::class);
    Route::resource('/input-auditor/{input_auditor}/input', DetailAuditorController::class);
    Route::resource('/input-auditor', TimAuditorController::class);
    Route::get('/setup-audit/{setup_audit}/download', [SetupAuditController::class, 'download'])->name('setup-audit.download');
    Route::resource('/setup-audit/{setup_audit}/detail', DetailAuditController::class);
    Route::get('/add-user', [SetupAuditController::class, 'add_user'])->name('admin.user.add');
    Route::get('/edit-user', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::delete('/admin/user/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    Route::delete('/admin/user/{user}', [UserController::class, 'delete'])->name('admin.user.destroy');
    Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.user.index');
    Route::resource('/input-auditor', TimAuditorController::class);
    Route::resource('/setup-file', UnitAuditController::class);
    Route::resource('/setup-file/{setup_file}/audit', FileSetupController::class);
    Route::get('/auditor', function () {
        return view('auditor.index');
    })->name('auditor.index');
    Route::get('/auditee', function () {
        return view('auditee.index');
    })->name('auditee.index');
});

// Routes accessible to the ketua_auditor role
Route::middleware(['auth', 'role:administrator|ketua_auditor'])->group(function () {
    // Add your ketua_auditor-specific routes here
    Route::resource('/input-auditor', TimAuditorController::class);
    Route::resource('/setup-file', UnitAuditController::class);
    Route::resource('/setup-file/{setup_file}/audit', FileSetupController::class);
});

// Routes accessible to the auditor role
Route::middleware(['auth', 'role:administrator|auditor'])->group(function () {
    // Add your auditor-specific routes here
    Route::get('/auditor', function () {
        return view('auditor.index');
    })->name('auditor.index');
});

// Routes accessible to the auditee role
Route::middleware(['auth', 'role:administrator|auditee'])->group(function () {
    // Add your auditee-specific routes here
    Route::get('/auditee', function () {
        return view('auditee.index');
    })->name('auditee.index');
});

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home');