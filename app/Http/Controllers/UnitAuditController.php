<?php

namespace App\Http\Controllers;

use App\Models\UnitAudit;
use App\Models\PeriodeAudit;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('setup.setup-unit.index', [
            'periode' => PeriodeAudit::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setup.setup-unit.create', [
            'unit' => Unit::all()
        ]);
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
    public function update(Request $request, UnitAudit $unitAudit)
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