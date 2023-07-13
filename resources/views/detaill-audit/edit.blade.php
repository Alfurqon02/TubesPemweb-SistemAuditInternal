@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit Unit Audit</h5>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('detail.update', ['setup_audit' => $setup_id, 'detail' => $detail_id]) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="nama">Nama Tim</label>
                                <input id="nama" class="form-control @error('nama')
                                    is-invalid
                                @enderror" type="text" name="nama" required value="{{ old('nama', $a->nama_tim) }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="nama_ketua_tim">Nama Ketua Tim</label>
                                <input id="nama_ketua_tim" class="form-control @error('nama_ketua_tim')
                                    is-invalid
                                @enderror" type="text" name="nama_ketua_tim" required value="{{ old('nama_ketua_tim', $a->nama_ketua_tim) }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="nip_ketua_tim">NIP Ketua Tim</label>
                                <input id="nip_ketua_tim" class="form-control @error('nip_ketua_tim')
                                    is-invalid
                                @enderror" type="text" name="nip_ketua_tim" required value="{{ old('nip_ketua_tim', $a->nip_ketua_tim) }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="nama_unit" class="form-label">Unit Audit</label>
                                <input type="text" class="form-control @error('nama_unit')
                                    is-invalid
                                @enderror" id="autocomplete_basic" autocomplete="new-search" name="nama_unit" required value="{{ old('nama_unit', $a->nama_unit) }}">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_audit" class="form-label">Tanggal Audit</label>
                                <input type="date" class="form-control @error('tanggal_audit')
                                    is-invalid
                                @enderror" id="nama_unit" name="tanggal_audit" required value="{{ old('tanggal_audit', $a->tanggal_audit) }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Unit Audit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
