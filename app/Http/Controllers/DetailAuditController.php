<?php

namespace App\Http\Controllers;

use App\Models\PeriodeAudit;
use App\Models\UnitAudit;
use App\Models\Unit;
use Illuminate\Http\Request;

class DetailAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PeriodeAudit $setup_audit)
    {
        // dd($setup_audit->id);
        // ->where('id', '=', $setup_audit)
        // return PeriodeAudit::with('unit')->get();
        return view('detaill-audit.index', [
            'units' => PeriodeAudit::with('unit')->where('id', '=', $setup_audit->id)->get()
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
    public function show(PeriodeAudit $periodeAudit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeriodeAudit $periodeAudit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PeriodeAudit $periodeAudit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeriodeAudit $periodeAudit)
    {
        //
    }
}
