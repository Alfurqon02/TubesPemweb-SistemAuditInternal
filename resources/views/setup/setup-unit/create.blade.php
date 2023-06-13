@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Masukkan Unit Audit</h5>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('setup-unit.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama">Unit</label>
                                <select id="nama" class="form-select" name="nama">
                                    <option></option>
                                    @foreach ($unit as $u)
                                        <option value="{{ $u->id }}">{{ $u->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="no_sk_tugas_audit" class="form-label">Tanggal Audit</label>
                                <input type="date" class="form-control" id="no_sk_tugas_audit" name="no_sk_tugas_audit">
                            </div>
                            <div class="mb-3">
                                <label for="file_sk" class="form-label">Upload File SK</label>
                                <input class="form-control" type="file" id="file_sk" name="file_sk">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_sk">Tanggal File SK</label>
                                <input id="tanggal_sk" class="form-control" type="date" name="tanggal_sk"/>
                            </div>
                            <div class="mb-3">
                                <label for="nama_ketua_spi" class="form-label">Nama Ketua SPI</label>
                                <input type="text" class="form-control" id="nama_ketua_spi" name="nama_ketua_spi"/>
                            </div>
                            <div class="mb-3">
                                <label for="nip_ketua_spi" class="form-label">NIP Ketua SPI</label>
                                <input type="text" class="form-control" id="nip_ketua_spi" name="nip_ketua_spi">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Periode</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
