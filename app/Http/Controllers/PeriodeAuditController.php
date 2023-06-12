<?php

namespace App\Http\Controllers;

use App\Models\PeriodeAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeriodeAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('setup.setup-periode.index', [
            'periode' => PeriodeAudit::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setup.setup-periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_audit' => 'required',
            'tanggal_audit' => 'required',
            'no_sk_tugas_audit' => 'required|max:64',
            'file_sk' => 'required|file',
            'tanggal_sk' => 'required',
            'nama_ketua_spi' => 'required',
            'nip_ketua_spi' => 'required',
        ]);
        // dd($validatedData);
        unset($validatedData['file_sk']);
        $periode = PeriodeAudit::create($validatedData);

        $path = $request->file('file_sk')->store('fileSK');

        $periode->update(['file_sk'=>$path]);

        return redirect(route('setup-periode.index'))->with('success', 'Periode Telah ditambahkan!');


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
    public function edit(PeriodeAudit $setup_periode)
    {
        return view('setup.setup-periode.edit', [
            'p' => $setup_periode
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PeriodeAudit $setup_periode)
    {
        $validatedData = $request->validate([
            'nama_audit' => 'required',
            'tanggal_audit' => 'required',
            'no_sk_tugas_audit' => 'required|max:64',
            'file_sk' => 'file',
            'tanggal_sk' => 'required',
            'nama_ketua_spi' => 'required',
            'nip_ketua_spi' => 'required',
        ]);
        // dd($validatedData);
        unset($validatedData['file_sk']);

        if($request->file('file_sk')){
            Storage::delete($setup_periode->file_sk);
            $path = $request->file('file_sk')->store('fileSK');
            $setup_periode->update(['file_sk'=>$path]);
        }

        $setup_periode->update($validatedData);

        return redirect(route('setup-periode.index'))->with('success', 'Periode Telah diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeriodeAudit $setup_periode)
    {
        if($setup_periode->file_sk){
            Storage::delete($setup_periode->file_sk);
        }

        $setup_periode->delete();
        return redirect(route('setup-periode.index'))->with('success', 'Periode Telah dihapus!');
    }

    public function download(PeriodeAudit $setup_periode){
        $headers = "SK " . $setup_periode->nama_audit . ".pdf";
        return Storage::download($setup_periode->file_sk, $headers);
    }
}
