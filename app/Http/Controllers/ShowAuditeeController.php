<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShowAuditeeController extends Controller
{
    public function index(){
        $idUnit = Auth::user()->id_unit;
        $audit = DB::table('unit_audit')
        ->join('periode_audit', 'periode_audit.id', '=', 'unit_audit.id_periode_audit')
        ->join('unit', 'unit_audit.id_unit', '=', 'unit.id')
        ->join('tim_auditor', 'unit_audit.id_tim_auditor','=','tim_auditor.id')
        ->join('user_tim', 'tim_auditor.id','=','user_tim.id_tim')
        ->join('users', 'user_tim.id_user','=','users.id')
        // ->join('file_audit', 'unit_audit.id_file','=','file_audit.id')
        ->where('unit_audit.id_unit', '=', $idUnit)
        ->select('periode_audit.nama as nama_periode',
                'unit.nama as nama_unit',
                'unit_audit.id as id',
                'unit_audit.tanggal_audit as tanggal_audit',
                'tim_auditor.nama_ketua_tim as nama_ketua_tim',
                'periode_audit.nama_ketua_spi as nama_ketua_spi',)
        ->get();
        // dd($audit);
        // return $idUnit;
        // $periode = PeriodeAudit::all()->where('id', '=', $setup_audit->id);
        return view('audite.index', [
            // 'periode' => $periode,
            'audit' => $audit,
            // 'id' => $setup_audit->id,
        ]);
    }
}
