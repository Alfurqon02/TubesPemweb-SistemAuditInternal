<?php

namespace App\Http\Controllers;

use App\Models\UnitAudit;
use App\Http\Requests\StoreUnitAuditRequest;
use App\Http\Requests\UpdateUnitAuditRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UnitAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idUser = Auth::user()->id;
        $audit = DB::table('unit_audit')
        ->join('periode_audit', 'periode_audit.id', '=', 'unit_audit.id_periode_audit')
        ->join('unit', 'unit_audit.id_unit', '=', 'unit.id')
        ->join('tim_auditor', 'unit_audit.id_tim_auditor','=','tim_auditor.id')
        ->join('user_tim', 'tim_auditor.id','=','user_tim.id_tim')
        ->join('users', 'user_tim.id_user','=','users.id')
        // ->join('file_audit', 'unit_audit.id_file','=','file_audit.id')
        ->where('user_tim.id_user', '=', $idUser)
        ->select('periode_audit.nama as nama_periode',
                'unit.nama as nama_unit',
                'unit_audit.id as id',
                'unit_audit.tanggal_audit as tanggal_audit',
                'tim_auditor.nama_ketua_tim as nama_ketua_tim',
                'periode_audit.nama_ketua_spi as nama_ketua_spi',)
        ->get();
        // $periode = PeriodeAudit::all()->where('id', '=', $setup_audit->id);
        return view('menu-auditor.index', [
            // 'periode' => $periode,
            'audit' => $audit,
            // 'id' => $setup_audit->id,
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
    public function store(StoreUnitAuditRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitAudit $unitAudit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitAudit $unitAudit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitAuditRequest $request, UnitAudit $unitAudit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitAudit $unitAudit)
    {
        //
    }
}
