<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeriodeAudit;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'periode' => PeriodeAudit::all()
        ]);
    }
}