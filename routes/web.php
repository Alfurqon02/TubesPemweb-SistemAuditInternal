<?php

use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitAuditController;
use App\Http\Controllers\PeriodeAuditController;

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
    return view('welcome');
});
Route::get('/login', function () {
    return view('authentication.login');
});
Route::get('/register', function () {
    return view('authentication.register');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});


Route::get('/setup-audit', function () {
    return view('setup.index');
})->name('setup-audit');

Route::resource('/setup-audit/setup-periode', PeriodeAuditController::class);
Route::get('/setup-audit/setup-periode/{setup_periode}/download', [PeriodeAuditController::class, 'download'])->name('setup-periode-download');

Route::resource('/setup-audit/setup-unit', UnitAuditController::class);
