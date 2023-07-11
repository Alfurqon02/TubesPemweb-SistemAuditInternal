@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Buat Unit Audit</h5>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('detail.store', $id) }}" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Tim</label>
                                <input id="nama" class="form-control" type="text" name="nama" required/>
                            </div>
                            <div class="mb-3">
                                <label for="nip_ketua_tim" class="form-label">NIP Ketua Tim</label>
                                <input type="search" class="form-control" id="autocomplete_user_nip" autocomplete="new-search" name="nip_ketua_tim" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_ketua_tim" class="form-label">Nama Ketua Tim</label>
                                <input type="text" class="form-control" id="nama_ketua_tim" name="nama_ketua_tim" value="" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nama_unit" class="form-label">Unit Audit</label>
                                <input type="search" class="form-control" id="autocomplete_unit" autocomplete="new-search" placeholder="Cari Unit" name="nama_unit"required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_audit" class="form-label">Tanggal Audit</label>
                                <input id="tanggal_audit" class="form-control" type="date" name="tanggal_audit" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $('#autocomplete_user_nip').blur((e)=>{
        let nip = $('#autocomplete_user_nip').val();
        let name
        fetch('http://127.0.0.1:8000/api/users')
            .then((response) => response.json())
            .then((response) => {
                name = response.find((user) => user.nip == nip)
                console.log(name)
                $('#nama_ketua_tim').val(name.display_name);
            })
    })

</script>
@endsection

