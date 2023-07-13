@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Parameter Standar Ruang Lingkup</h5>
                <p>{!! $unit_audit->parameter_standar_ruang_lingkup !!}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Unggah File</h5>
                <form method="post" action="{{ route('upload.store', $id) }}" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    @foreach ($jenis_file as $jenis)
                        <div class="mb-3">
                            <label for="file_sk" class="form-label">Upload File {{ $jenis->nama_file }}</label>
                            <input class="form-control" type="file" id="file_sk"
                                name="{{ strtolower(str_replace(' ', '_', $jenis->nama_file)) }}">
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary d-flex ms-auto">Submit</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Dokumen Auditee</h5>
                @if ($file_audit->laporan_keuangan == null && $file_audit->laporan_operasional == null && $file_audit->laporan_kepatuhan == null && $file_audit->laporan_rencana_tindak_lanjut == null)
                    <div class="mb-3"> Belum ada File yang Diunggah</div>
                @endif
                @if ($file_audit->laporan_keuangan != null)
                    <div class="mb-3">
                        <a href="">Laporan Keuangan</a>
                    </div>
                @endif
                @if ($file_audit->laporan_operasional != null)
                    <div class="mb-3">
                        <a href="">Laporan Operasional</a>
                    </div>
                @endif
                @if ($file_audit->laporan_kepatuhan != null)
                    <div class="mb-3">
                        <a href="">Laporan Kepatuhan</a>
                    </div>
                @endif
                @if ($file_audit->laporan_rencana_tindak_lanjut != null)
                    <div class="mb-3">
                        <a href="">Laporan Rencana Tindak Lanjut</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Dokumen Auditor</h5>
                @if ($file_audit->laporan_temuan_rekomendasi == null && $file_audit->laporan_hasil_audit == null)
                    <div class="mb-3"> Belum ada File yang Diunggah</div>
                @endif
                @if ($file_audit->laporan_temuan_rekomendasi != null)
                    <div class="mb-3">
                        <a href="">Temuan dan Rekomendasi Tindak Lanjut</a>
                    </div>
                @endif
                @if ($file_audit->laporan_hasil_audit != null)
                    <div class="mb-3">
                        <a href="">Hasil Audit</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
