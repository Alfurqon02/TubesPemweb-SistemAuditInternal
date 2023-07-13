@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        <div class="col d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Histori Audit</h5>
                        </div>
                    </div>
                    {{-- Add Content Here! --}}
                    <table id="example" class="table table-striped mt-9" style="width:100%">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Audit</th>
                                <th>Tanggal Mulai Audit</th>
                                <th>Tanggal Selesai Audit</th>
                                <th>Ketua SPI</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @foreach ($periode as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->tanggal_mulai }}</td>
                            <td>{{ $p->tanggal_selesai }}</td>
                            <td>{{ $p->nama_ketua_spi }}</td>
                            <td></td>
                        <tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$('#confirmDelete').on('show.bs.modal', function(e) {
    var id_periode = $(e.relatedTarget).data('id');
    console.log(id_periode);
    $(e.currentTarget).find('#form-delete').attr('action', 'setup-audit/' + id_periode);
})
</script>
@endsection