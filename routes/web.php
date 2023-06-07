<?php

use App\Models\Unit;
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
    return view('welcome');
});
Route::get('/login', function () {
    return view('authentication.login');
});
Route::get('/register', function () {
    return view('authentication.register');
});

Route::get('/unit', function () {
    dd(Unit::find(1)->unitAudit);
});
