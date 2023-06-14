<?php

namespace App\Http\Controllers;

use App\Models\PeriodeAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SetupAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('setup-audit.index', [
            'periode' => PeriodeAudit::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setup-audit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'no_sk_audit' => 'required|max:64',
            'file_sk' => 'required|file',
            'tanggal_sk' => 'required',
            'nama_ketua_spi' => 'required',
            'nip_ketua_spi' => 'required',
        ]);

        unset($validatedData['file_sk']);
        $periode = PeriodeAudit::create($validatedData);

        $path = $request->file('file_sk')->store('fileSK');

        $periode->update(['file_sk'=>$path]);

        // dd($validatedData);

        return redirect(route('setup-audit.index'))->with('success', 'Periode Telah ditambahkan!');


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
    public function edit(PeriodeAudit $setup_audit)
    {
        return view('setup-audit.edit', [
            'p' => $setup_audit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PeriodeAudit $setup_audit)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'no_sk_audit' => 'required|max:64',
            'file_sk' => 'required|file',
            'tanggal_sk' => 'required',
            'nama_ketua_spi' => 'required',
            'nip_ketua_spi' => 'required',
        ]);
        // dd($validatedData);
        unset($validatedData['file_sk']);

        if($request->file('file_sk')){
            Storage::delete($setup_audit->file_sk);
            $path = $request->file('file_sk')->store('fileSK');
            $setup_audit->update(['file_sk'=>$path]);
        }

        $setup_audit->update($validatedData);

        return redirect(route('setup-audit.index'))->with('success', 'Periode Telah diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeriodeAudit $setup_audit)
    {
        // dd($setup_audit);
        if($setup_audit->file_sk){
            Storage::delete($setup_audit->file_sk);
        }

        $setup_audit->delete();
        return redirect(route('setup-audit.index'))->with('success', 'Audit Telah dihapus!');
    }

    public function download(PeriodeAudit $setup_audit){
        $headers = "SK " . $setup_audit->nama_audit . ".pdf";
        return Storage::download($setup_audit->file_sk, $headers);
    }
}
