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
                                @foreach ($periode as $p)
                                    <h5 class="card-title fw-semibold">{{ $p->nama }}</h5>
                                @endforeach

                            </div>
                        </div>
                        {{-- Add Content Here! --}}
                        <a href="{{ route('detail.create', $id) }}" class="btn btn-primary d-flex align-items-center"
                            style="width: 17%"><svg xmlns="http://www.w3.org/2000/svg"
                                class="me-9 icon icon-tabler icon-tabler-calendar-plus" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5"></path>
                                <path d="M16 3v4"></path>
                                <path d="M8 3v4"></path>
                                <path d="M4 11h16"></path>
                                <path d="M16 19h6"></path>
                                <path d="M19 16v6"></path>
                            </svg>Tambah Unit</a>
                        <table id="example" class="table table-striped mt-9" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Tim</th>
                                    <th>Unit</th>
                                    <th>Tanggal Audit</th>
                                    <th>Ketua Tim Auditor</th>
                                    <th>NIP Ketua Tim Auditor</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($audit as $a)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $a->nama_tim }}
                                        </td>
                                        <td>
                                            {{ $a->nama_unit }}
                                        </td>
                                        <td>
                                            {{ $a->tanggal_audit }}
                                        </td>
                                        <td>
                                            {{ $a->nama_ketua_tim }}
                                        </td>
                                        <td>
                                            {{ $a->nip_ketua_tim }}
                                        </td>
                                        <td>
                                            {{-- edit --}}
                                            <a href="{{ route('detail.edit', ['setup_audit' => $id, 'detail' => $a->id]) }}" class="badge bg-warning"><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-edit" width="20" height="20"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                    </path>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                    </path>
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                    </path>
                                                    <path d="M16 5l3 3"></path>
                                                </svg></a>
                                            {{-- delete --}}
                                            <button class="badge bg-danger border-0" data-id="{{ $a->id }}" data-periode="{{ $id }}" onclick=""
                                                data-bs-toggle="modal" data-bs-target="#confirmDelete"><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash-x" width="20"
                                                    height="20" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                    </path>
                                                    <path d="M4 7h16"></path>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12">
                                                    </path>
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
                <form action="/" method="POST" class="d-inline" id="form-delete">
                    @csrf
                    @method('DELETE')
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
            var unit = $(e.relatedTarget).data('id');
            var periode = $(e.relatedTarget).data('periode');
            console.log(unit);
            console.log(periode);
            $(e.currentTarget).find('#form-delete').attr('action', '/setup-audit/' + periode + '/detail/' + unit);
        });
    </script>
@endsection
