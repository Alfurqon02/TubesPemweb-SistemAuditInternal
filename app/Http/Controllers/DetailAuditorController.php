<?php

namespace App\Http\Controllers;

use App\Models\PeriodeAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailAuditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $audit = DB::table('unit_audit')
        ->join('periode_audit', 'periode_audit.id', '=', 'unit_audit.id_periode_audit')
        ->join('unit', 'unit_audit.id_unit', '=', 'unit.id')
        ->join('tim_auditor', 'unit_audit.id_tim_auditor','=','tim_auditor.id')
        ->select('unit.nama as nama_unit',
                'unit_audit.tanggal_audit as tanggal_audit',
                'periode_audit.nama_ketua_spi as nama_ketua_spi',
                'periode_audit.nip_ketua_spi as nip_ketua_spi',
                'unit_audit.id as id',
                'periode_audit.nama as nama_periode')
        ->get();
        $periode = PeriodeAudit::all();
        return view ('input-auditor.index', [
            'audit' => $audit,
            'periode' => $periode,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PeriodeAudit $setup_audit)
    {
        $audit = DB::table('unit_audit')
        ->join('periode_audit', 'periode_audit.id', '=', 'unit_audit.id_periode_audit')
        ->join('unit', 'unit_audit.id_unit', '=', 'unit.id')
        ->join('tim_auditor', 'unit_audit.id_tim_auditor','=','tim_auditor.id')
        ->where('periode_audit.id', '=', $setup_audit->id)
        ->select('unit.nama as nama_unit',
                'unit_audit.tanggal_audit as tanggal_audit',
                'tim_auditor.nama_ketua_tim as nama_ketua_tim',
                'tim_auditor.nip_ketua_tim as nip_ketua_tim',
                'tim_auditor.nama as nama_tim',
                'unit_audit.id as id' )
        ->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
