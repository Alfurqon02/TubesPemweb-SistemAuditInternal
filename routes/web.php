<?php
use App\Models\TimAuditorCon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UnitAuditController;
use App\Http\Controllers\SetupAuditController;
use App\Http\Controllers\TimAuditorController;
use App\Http\Controllers\DetailAuditController;
use App\Http\Controllers\DetailAuditorController;

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

Route::middleware(['auth'])->group(function () {

     // Account
    Route::get('/account', [AccountController::class, 'showAccount'])->name('account');

    //  Profile
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');

    // Profile
    Route::get('/task', [ProfileController::class, 'showTask'])->name('task');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    // Setup Audit
    Route::resource('/setup-audit', SetupAuditController::class);
    Route::resource('/input-auditor', TimAuditorController::class);

    // Setup Setup
    // Route::resource('/setup-audit/setup-Setup', SetupAuditController::class);
    Route::get('/setup-audit/{setup_audit}/download', [SetupAuditController::class, 'download'])->name('setup-audit.download');

    // Setup Unit
    Route::resource('/setup-audit/{setup_audit}/detail', DetailAuditController::class);
    // Route::delete('/setup-audit/{setup_audit}/detail/{detail}', [DetailAuditController::class, 'destroy']);
    // Route::get('/setup-audit/{setup_audit}/detail', [DetailAuditController::class, 'search']);

    //Input Auditor
    Route::resource('/input-auditor', DetailAuditorController::class);
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
