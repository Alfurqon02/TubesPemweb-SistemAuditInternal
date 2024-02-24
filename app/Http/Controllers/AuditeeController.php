<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\FileAudit;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUnitRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AuditeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view ('audite.create',[
            'audit'=>Unit::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($audit)
    {
        $jenisFile = DB::table('jenis_file_audit')
            ->join('jenis_file', 'jenis_file_audit.id_jenis_file', '=', 'jenis_file.id')
            ->where('id_unit_audit', '=', $audit)
            ->select(
                'id_jenis_file as id_file',
                'jenis_file.nama as nama_file'
            )
            ->get();
        $fileAudit = DB::table('unit_audit')
            ->join('file_audit', 'unit_audit.id_file_audit', '=', 'file_audit.id')
            ->where('unit_audit.id', '=', $audit)
            ->get();
        $cekFile = DB::table('jenis_file_audit')
                ->join('jenis_file', 'jenis_file_audit.id_jenis_file', '=', 'jenis_file.id')
                ->where('jenis_file_audit.id_unit_audit', '=', $audit)
                ->select('jenis_file.filename as filename')
                ->get();
        $unitAudit = DB::table('unit_audit')
            ->where('id', '=', $audit)
            ->get();
        // $cekFileAudit = DB::table('unit_audit')
        //     ->join('file_audit', 'unit_audit.id_file_audit', '=', 'file_audit.id')
        //     ->where('unit_audit.id', '=', $audit)
        //     ->select('file_audit.id as id_file')
        //     ->get();

            // return $fileAudit;
        return view('audite.create', [
            'id' => $audit,
            'jenis_file' => $jenisFile,
            'unit_audit' => $unitAudit[0],
            'file_audit' => $fileAudit[0]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($audit, Request $request)
    {
        $validatedData = $request->validate([
            'laporan_keuangan' => 'file',
            'laporan_operasional' => 'file',
            'laporan_kepatuhan' => 'file',
            'laporan_rencana_tindak_lanjut' => 'file',
            'laporan_temuan_rekomendasi' => 'file',
            'laporan_hasil_audit' => 'file'
        ]);
        $cekFileAudit = DB::table('unit_audit')
            ->join('file_audit', 'unit_audit.id_file_audit', '=', 'file_audit.id')
            ->where('unit_audit.id', '=', $audit)
            ->select('file_audit.id as id_file')
            ->get();


        $file = null;
        if ($cekFileAudit == null) {
            $file = FileAudit::create($validatedData);
        } else {
            $file = FileAudit::find($cekFileAudit[0]->id_file);
        }

        if ($request->hasFile('laporan_temuan_rekomendasi')) {
            $path_laporan_temuan_rekomendasi = $request->file('laporan_temuan_rekomendasi')->store('file_laporan_temuan_rekomendasi');
            if ($file->laporan_temuan_rekomendasi) {
                Storage::delete($file->laporan_temuan_rekomendasi); // Menghapus file yang sudah ada dari storage
            }
            $file->update(['laporan_temuan_rekomendasi' => $path_laporan_temuan_rekomendasi]);
        }
        if ($request->hasFile('laporan_hasil_audit')) {
            $path_laporan_hasil_audit = $request->file('laporan_hasil_audit')->store('file_laporan_hasil_audit');
            if ($file->laporan_hasil_audit) {
                Storage::delete($file->laporan_hasil_audit); // Menghapus file yang sudah ada dari storage
            }
            $file->update(['laporan_hasil_audit' => $path_laporan_hasil_audit]);
        }

        if ($request->hasFile('laporan_keuangan')) {
            $path_laporan_keuangan = $request->file('laporan_keuangan')->store('file_laporan_keuangan');
            if ($file->laporan_keuangan) {
                Storage::delete($file->laporan_keuangan); // Menghapus file yang sudah ada dari storage
            }
            $file->update(['laporan_keuangan' => $path_laporan_keuangan]);
        }

        if ($request->hasFile('laporan_operasional')) {
            $path_laporan_operasional = $request->file('laporan_operasional')->store('file_laporan_operasional');
            if ($file->laporan_operasional) {
                Storage::delete($file->laporan_operasional); // Menghapus file yang sudah ada dari storage
            }
            $file->update(['laporan_operasional' => $path_laporan_operasional]);
        }

        if ($request->hasFile('laporan_kepatuhan')) {
            $path_laporan_kepatuhan = $request->file('laporan_kepatuhan')->store('file_laporan_kepatuhan');
            if ($file->laporan_kepatuhan) {
                Storage::delete($file->laporan_kepatuhan); // Menghapus file yang sudah ada dari storage
            }
            $file->update(['laporan_kepatuhan' => $path_laporan_kepatuhan]);
        }

        if ($request->hasFile('laporan_rencana_tindak_lanjut')) {
            $path_laporan_rencana_tindak_lanjut = $request->file('laporan_rencana_tindak_lanjut')->store('file_laporan_rencana_tindak_lanjut');
            if ($file->laporan_rencana_tindak_lanjut) {
                Storage::delete($file->laporan_rencana_tindak_lanjut); // Menghapus file yang sudah ada dari storage
            }
            $file->update(['laporan_rencana_tindak_lanjut' => $path_laporan_rencana_tindak_lanjut]);
        }

        $idFile = $file->id;
        DB::table('unit_audit')->where('unit_audit.id', '=', $audit)->update(['id_file_audit' => $idFile]);

        return redirect(route('upload.create', $audit))->with('success', 'Surat Telah diunggah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
