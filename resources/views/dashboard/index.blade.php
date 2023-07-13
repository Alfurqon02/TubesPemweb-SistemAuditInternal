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
                                <th>Nama Periode</th>
                                <th>Ketua SPI</th>
                                <th>Nama Tim</th>
                                <th>Nama Unit</th>
                                <th>Ketua Tim</th>
                                <th>Tanggal Audit</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @foreach ($tampilan as $t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $t->nama_periode }}</td>
                            <td>{{ $t->ketua_spi }}</td>
                            <td>{{ $t->nama_tim }}</td>
                            <td>{{ $t->nama_unit }}</td>
                            <td>{{ $t->ketua_tim }}</td>
                            <td>{{ $t->tanggal }}</td>
                            <td>
                                @if ($t->status == 0)
                                Berlangsung
                                @else
                                Selesai
                                @endif
                            </td>
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
