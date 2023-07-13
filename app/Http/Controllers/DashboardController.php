<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeriodeAudit;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $tampilan = DB::table('periode_audit')
                    ->join('unit_audit', 'periode_audit.id', '=', 'unit_audit.id_periode_audit')
                    ->join('tim_auditor', 'unit_audit.id_tim_auditor', '=', 'tim_auditor.id')
                    ->join('unit', 'unit_audit.id_unit' ,'=', 'unit.id')
                    ->select('periode_audit.nama as nama_periode',
                            'periode_audit.nama_ketua_spi as ketua_spi',
                            'tim_auditor.nama as nama_tim',
                            'unit.nama as nama_unit',
                            'tim_auditor.nama_ketua_tim as ketua_tim',
                            'unit_audit.tanggal_audit as tanggal',
                            'unit_audit.is_closed as status')
                    ->get();
                    // return $tampilan;
        return view('dashboard.index', [
            'tampilan' => $tampilan
        ]);
    }
}
