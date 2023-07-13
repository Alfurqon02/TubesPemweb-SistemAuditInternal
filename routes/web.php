<?php
use App\Models\TimAuditorCon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuditeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FileSetupController;
use App\Http\Controllers\UnitAuditController;
use App\Http\Controllers\SetupAuditController;
use App\Http\Controllers\TimAuditorController;
use App\Http\Controllers\DetailAuditController;
use App\Http\Controllers\DetailAuditorController;
use App\Http\Controllers\ShowAuditeeController;

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

    //  Profile
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');

    // Profile
    Route::get('/task', [ProfileController::class, 'showTask'])->name('task');

    //API
    Route::prefix('/api')->group(function(){
    Route::get('/users', [APIController::class, 'ApiUser']);
    Route::get('/audit', [APIController::class, 'ApiAudit']);
    });

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    // Setup Audit
    Route::resource('/setup-audit', SetupAuditController::class);

    //Input Auditor
    Route::resource('/input-auditor/{input_auditor}/input', DetailAuditorController::class);
    Route::resource('/input-auditor', TimAuditorController::class);

    // Downlaod SK
    Route::get('/setup-audit/{setup_audit}/download', [SetupAuditController::class, 'download'])->name('setup-audit.download');

    // Setup Unit
    Route::resource('/setup-audit/{setup_audit}/detail', DetailAuditController::class);

    //Menu Auditor
    Route::resource('/setup-file', UnitAuditController::class);

    //Setup File
    Route::resource('/setup-file/{setup_file}/audit', FileSetupController::class);

    //Upload File
    Route::get('/file', [ShowAuditeeController::class, 'index'])->name('showAuditee');
    Route::resource('/file/{audit}/upload', AuditeeController::class);

});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
