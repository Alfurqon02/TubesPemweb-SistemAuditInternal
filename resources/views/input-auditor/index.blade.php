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
                                <h5 class="card-title fw-semibold">Input Auditor</h5>
                            </div>
                        </div>
                        {{-- Add Content Here! --}}

                        <table id="example" class="table table-striped mt-9" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Audit</th>
                                    <th>Tanggal Audit</th>
                                    <th>Nama Unit</th>
                                    <th>Nama Tim</th>
                                    <th>Ketua SPI</th>
                                    <th>File SK</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($periode as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->tanggal_mulai }}</td>
                                        <td>{{ $p->tanggal_selesai }}</td>
                                        <td>{{ $p->nama_ketua_spi }}</td>
                                        <td><a href="{{ route('setup-audit.download', $p->id) }}">Unduh File</a></td>
                                        <td>
                                            <a href="" class="badge bg-info"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-eye" width="20" height="20"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                    <path
                                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                                    </path>
                                                </svg></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

        {{-- confirm delete modal --}}
        <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="" method="POST" class="d-inline"
                        id="form-delete">
                        @csrf
                        @method('delete')
                        <div class="modal-body"
                            style="height: 100px; display: flex; align-items: center; justify-content: center;">
                            <h5 class="text-center">Apakah Anda yakin ingin menghapus?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<script>
    $('#confirmDelete').on('show.bs.modal', function (e) {
        var id_periode = $(e.relatedTarget).data('id');
        console.log(id_periode);
        $(e.currentTarget).find('#form-delete').attr('action', 'setup-audit/' + id_periode);
    })
</script>
@endsection
