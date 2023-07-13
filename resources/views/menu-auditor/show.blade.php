@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <form action="{{ route('audit.store', $id) }}" method="POST">
                        @csrf
                        <div>
                            <h2 class="card-title fw-semibold">Parameter Standar Ruang Lingkup</h2>
                            <input value="{{ old('parameter_standar_ruang_lingkup', $parameter_standar_ruang_lingkup) }}""
                                type="hidden" name="parameter_standar_ruang_lingkup" id="parameter_standar_ruang_lingkup">
                            <trix-editor input="parameter_standar_ruang_lingkup"></trix-editor>
                        </div>
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="mb-3 mb-sm-0">
                                <h2 class="card-title fw-semibold mt-3">Setup File</h2>
                            </div>
                        </div>
                        <p>File yang Harus Diunggah Auditee</p>
                        <hr>
                        @foreach ($jenis_file as $file)
                            <div>
                                <label class="cyberpunk-checkbox-label">
                                    <input name="id_file_audit[]" class="cyberpunk-checkbox" type="checkbox"
                                        value="{{ $file->id }}"
                                        @foreach ($checked as $check)
                                            @if ($check->id_file == $file->id)
                                                @checked(true)
                                            @endif @endforeach>
                                    {{ $file->nama }}</label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary mt-3 d-flex ms-auto">Set</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col d-flex align-items-strech">
            <div class="card w-100">
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
        </div>
        <div class="col d-flex align-items-strech">
            <div class="card w-100">
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
    </div>
@endsection
