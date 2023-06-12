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
                                <h5 class="card-title fw-semibold">Setup Unit Audit</h5>
                            </div>
                        </div>
                        {{-- Add Content Here! --}}
                        <a href="{{ route('setup-unit.create') }}" class="btn btn-primary d-flex align-items-center"
                            style="width: 17%"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-up me-9" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2c.641 0 1.212 .302 1.578 .771"></path>
                                <path d="M20.136 11.136l-8.136 -8.136l-9 9h2v7a2 2 0 0 0 2 2h6.344"></path>
                                <path d="M19 22v-6"></path>
                                <path d="M22 19l-3 -3l-3 3"></path>
                             </svg>Masukkan Unit</a>

                        <table id="example" class="table table-striped mt-9" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal Audit</th>
                                    <th>Ketua SPI</th>
                                    <th>NIP</th>
                                    <th>File SK</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($periode as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama_audit }}</td>
                                        <td>{{ $p->tanggal_audit }}</td>
                                        <td>{{ $p->nama_ketua_spi }}</td>
                                        <td><a href="{{ route('setup-periode-download', $p->id) }}">Unduh File</a></td>
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
                                            <a href="{{ route('setup-periode.edit', $p->id) }}"
                                                class="badge bg-warning"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-edit" width="20" height="20"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                    </path>
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                    </path>
                                                    <path d="M16 5l3 3"></path>
                                                </svg></a>
                                            <button class="badge bg-danger border-0" data-id="{{ $p->id }}" onclick="" data-bs-toggle="modal"
                                                data-bs-target="#confirmDelete"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash-x" width="20"
                                                    height="20" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 7h16"></path>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    <path d="M10 12l4 4m0 -4l-4 4"></path>
                                                </svg>
                                            </button>
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
    <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
@endsection
