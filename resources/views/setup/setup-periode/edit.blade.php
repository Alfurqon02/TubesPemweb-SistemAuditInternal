@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit Periode Audit</h5>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('setup-periode.update', $p->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="tanggal_audit">Tanggal Audit</label>
                                <input id="tanggal_audit" class="form-control @error('tanggal_audit')
                                    is-invalid
                                @enderror" type="date" name="tanggal_audit" required value="{{ old('tanggal_audit', $p->tanggal_audit) }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="no_sk_tugas_audit" class="form-label">No SK Tugas Audit</label>
                                <input type="text" class="form-control @error('no_sk_tugas_audit')
                                    is-invalid
                                @enderror" id="no_sk_tugas_audit" name="no_sk_tugas_audit" required value="{{ old('no_sk_tugas_audit', $p->no_sk_tugas_audit) }}">
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
