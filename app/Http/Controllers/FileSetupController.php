<?php

namespace App\Http\Controllers;

use App\Models\UnitAudit;
use App\Models\FileAudit;
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
            ->select(
                'id_jenis_file as id_file',
                'jenis_file.nama as nama_file'
            )
            ->get();
        $jenisFile = DB::table('jenis_file')->get();
        $parameter = DB::table('unit_audit')
            ->where('id', '=', $setup_file)
            ->get();
        $fileAudit = DB::table('unit_audit')
            ->join('file_audit', 'unit_audit.id_file_audit', '=', 'file_audit.id')
            ->where('unit_audit.id', '=', $setup_file)
            ->get();
            // return $fileAudit[0];
        $file = null;
            if ($fileAudit[0] == null) {
                $file = FileAudit::create();
            } else {
                $file = FileAudit::find($fileAudit[0]->id_file_audit);
            }

        DB::table('unit_audit')->where('unit_audit.id', '=', $setup_file)->update(['id_file_audit' => $file->id]);
        return view('menu-auditor.show', [
            'file_audit' => $fileAudit[0],
            'id' => $setup_file,
            'jenis_file' => $jenisFile,
            'checked' => $checked,
            'parameter_standar_ruang_lingkup' => $parameter[0]->parameter_standar_ruang_lingkup
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
            'parameter_standar_ruang_lingkup' => 'required',
            'id_file_audit' => 'required',
        ]);

        DB::delete('delete from jenis_file_audit where id_unit_audit = ?', [$setup_file]);
        foreach ($request->id_file_audit as $id_file) {
            DB::insert('insert into jenis_file_audit (id_unit_audit, id_jenis_file) values (?, ?)', [$setup_file, $id_file]);
        }
        DB::table('unit_audit')->where('unit_audit.id', '=', $setup_file)->update(['parameter_standar_ruang_lingkup' => $request->parameter_standar_ruang_lingkup]);
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
