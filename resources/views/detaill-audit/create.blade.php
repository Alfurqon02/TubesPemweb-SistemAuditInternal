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
                                <label for="nama">Nama Unit</label>
                                <input id="nama" class="form-control" type="text" name="nama"/>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_audit">Tanggal Audit</label>
                                <input id="tanggal_audit" class="form-control" type="date" name="tanggal_audit"/>
                            </div>
                            <div class="mb-3">
                                <label for="nama_ketua_tim" class="form-label">Nama Ketua Tim</label>
                                <input type="text" class="form-control" id="nama_ketua_tim" name="nama_ketua_tim"/>
                            </div>
                            <div class="mb-3">
                                <label for="nip_ketua_tim" class="form-label">NIP Ketua Tim</label>
                                <input type="text" class="form-control" id="nip_ketua_tim" name="nip_ketua_tim">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Periode Audit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
