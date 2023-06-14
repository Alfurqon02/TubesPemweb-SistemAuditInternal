@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Buat Periode Audit</h5>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('setup-audit.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama">Nama Audit</label>
                                <input id="nama" class="form-control" type="text" name="nama"/>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_mulai">Tanggal Mulai Audit</label>
                                <input id="tanggal_mulai" class="form-control" type="date" name="tanggal_mulai"/>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_selesai">Tanggal Selesai Audit</label>
                                <input id="tanggal_selesai" class="form-control" type="date" name="tanggal_selesai"/>
                            </div>
                            <div class="mb-3">
                                <label for="no_sk_audit" class="form-label">No SK Tugas Audit</label>
                                <input type="text" class="form-control" id="no_sk_audit" name="no_sk_audit">
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
                            <button type="submit" class="btn btn-primary">Tambah Periode Audit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
