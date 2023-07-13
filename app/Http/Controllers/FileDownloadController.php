<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\FileAudit;
use App\Models\UnitAudit;

class FileDownloadController extends Controller
{
    public function download_keuangan(UnitAudit $audit){
        $fileDownload = DB::table('unit_audit')
                            ->join('file_audit', 'unit_audit.id_file_audit', '=', 'file_audit.id')
                            ->where('unit_audit.id', '=', $audit->id)
                            ->select('file_audit.laporan_keuangan as laporan_keuangan')
                            ->get();
        $headers = "laporan_keuangan.pdf";
        return Storage::download($fileDownload[0]->laporan_keuangan, $headers);
    }
    public function download_operasianal(UnitAudit $audit)
    {
        $fileDownload = DB::table('unit_audit')
                            ->join('file_audit', 'unit_audit.id_file_audit', '=', 'file_audit.id')
                            ->where('unit_audit.id', '=', $audit->id)
                            ->select('file_audit.laporan_operasional as laporan_operasional')
                            ->get();
        $headers = "laporan_operasional.pdf";
        return Storage::download($fileDownload[0]->laporan_operasional, $headers);
    }
    public function download_kepatuhan(UnitAudit $audit)
    {
        $fileDownload = DB::table('unit_audit')
                            ->join('file_audit', 'unit_audit.id_file_audit', '=', 'file_audit.id')
                            ->where('unit_audit.id', '=', $audit->id)
                            ->select('file_audit.laporan_kepatuhan as laporan_kepatuhan')
                            ->get();
        $headers = "laporan_kepatuhan.pdf";
        return Storage::download($fileDownload[0]->laporan_kepatuhan, $headers);
    }
    public function download_temuan(UnitAudit $audit)
    {
        $fileDownload = DB::table('unit_audit')
                            ->join('file_audit', 'unit_audit.id_file_audit', '=', 'file_audit.id')
                            ->where('unit_audit.id', '=', $audit->id)
                            ->select('file_audit.laporan_temuan_rekomendasi as laporan_temuan')
                            ->get();
        $headers = "temuan_dan_rekomendasi.pdf";
        return Storage::download($fileDownload[0]->laporan_temuan, $headers);
    }
    public function download_tindak_lanjut(UnitAudit $audit)
    {
        $fileDownload = DB::table('unit_audit')
                            ->join('file_audit', 'unit_audit.id_file_audit', '=', 'file_audit.id')
                            ->where('unit_audit.id', '=', $audit->id)
                            ->select('file_audit.laporan_rencana_tindak_lanjut as laporan_tindak_lanjut')
                            ->get();
        $headers = "rencana_tindak_lanjut.pdf";
        return Storage::download($fileDownload[0]->laporan_tindak_lanjut, $headers);
    }
    public function download_hasil(UnitAudit $audit)
    {
        $fileDownload = DB::table('unit_audit')
                            ->join('file_audit', 'unit_audit.id_file_audit', '=', 'file_audit.id')
                            ->where('unit_audit.id', '=', $audit->id)
                            ->select('file_audit.laporan_hasil_audit as hasil')
                            ->get();
        $headers = "hasil_audit.pdf";
        return Storage::download($fileDownload[0]->hasil, $headers);
    }
}
