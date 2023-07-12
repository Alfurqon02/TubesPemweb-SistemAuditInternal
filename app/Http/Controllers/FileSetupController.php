<?php

namespace App\Http\Controllers;

use App\Models\UnitAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($setup_file)
    {
        $checked = DB::table('jenis_file_audit')
                        ->join('jenis_file', 'jenis_file_audit.id_jenis_file', '=', 'jenis_file.id')
                        ->where('id_unit_audit', '=', $setup_file)
                        ->select('id_jenis_file as id_file',
                                'jenis_file.nama as nama_file')
                        ->get();
        $jenisFile = DB::table('jenis_file')->get();
        $cekFile = DB::table('');
        // return $checked;
        return view ('menu-auditor.show', [
            'id' => $setup_file,
            'jenis_file' => $jenisFile,
            'checked' => $checked,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($setup_file, Request $request)
    {

        $validatedData = $request->validate([
            'id_file_audit' => 'required',
        ]);
        DB::delete('delete from jenis_file_audit where id_unit_audit = ?', [$setup_file]);
        foreach ($request->id_file_audit as $id_file) {
            DB::insert('insert into jenis_file_audit (id_unit_audit, id_jenis_file) values (?, ?)', [$setup_file, $id_file]);
        }

        return redirect(route('audit.index', $setup_file))->with('success', 'Dokumen Telah Diset!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
