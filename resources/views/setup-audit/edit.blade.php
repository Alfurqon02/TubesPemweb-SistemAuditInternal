@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit Periode Audit</h5>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('setup-audit.update', $p->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="nama">Nama Audit</label>
                                <input id="nama" class="form-control @error('nama')
                                    is-invalid
                                @enderror" type="text" name="nama" required value="{{ old('nama', $p->nama) }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_mulai">Tanggal Mulai Audit</label>
                                <input id="tanggal_mulai" class="form-control @error('tanggal_mulai')
                                    is-invalid
                                @enderror" type="date" name="tanggal_mulai" required value="{{ old('tanggal_mulai', $p->tanggal_mulai) }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_selesai">Tanggal Selesai Audit</label>
                                <input id="tanggal_selesai" class="form-control @error('tanggal_selesai')
                                    is-invalid
                                @enderror" type="date" name="tanggal_selesai" required value="{{ old('tanggal_selesai', $p->tanggal_selesai) }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="no_sk_audit" class="form-label">No SK Tugas Audit</label>
                                <input type="text" class="form-control @error('no_sk_audit')
                                    is-invalid
                                @enderror" id="no_sk_audit" name="no_sk_audit" required value="{{ old('no_sk_audit', $p->no_sk_audit) }}">
                            </div>
                            <div class="mb-3">
                                <label for="file_sk" class="form-label">Upload File SK</label>
                                <input class="form-control" type="file" id="file_sk" name="file_sk">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_sk">Tanggal File SK</label>
                                <input id="tanggal_sk" class="form-control @error('tanggal_sk')
                                    is-invalid
                                @enderror" type="date" name="tanggal_sk" required value="{{ old('tanggal_sk', $p->tanggal_sk) }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="nama_ketua_spi" class="form-label">Nama Ketua SPI</label>
                                <input type="text" class="form-control @error('nama_ketua_spi')
                                    is-invalid
                                @enderror" id="nama_ketua_spi" name="nama_ketua_spi" required value="{{ old('nama_ketua_spi', $p->nama_ketua_spi) }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="nip_ketua_spi" class="form-label">NIP Ketua SPI</label>
                                <input type="text" class="form-control @error('nip_ketua_spi')
                                    is-invalid
                                @enderror" id="nip_ketua_spi" name="nip_ketua_spi" required value="{{ old('nip_ketua_spi', $p->nip_ketua_spi) }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Periode</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
