<?php

namespace App\Http\Controllers;

use App\Models\TimAuditor;
use App\Models\PeriodeAudit;
use App\Http\Requests\StoreTimAuditorRequest;
use App\Http\Requests\UpdateTimAuditorRequest;

class TimAuditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('input-auditor.index', [
            'periode' => PeriodeAudit::all()
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
    public function store(StoreTimAuditorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TimAuditor $timAuditor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimAuditor $timAuditor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimAuditorRequest $request, TimAuditor $timAuditor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimAuditor $timAuditor)
    {
        //
    }
}
