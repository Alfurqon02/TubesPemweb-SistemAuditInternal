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
                                    <h5 class="card-title fw-semibold">List Audit</h5>
                            </div>
                        </div>
                        <button onclick=""
                        data-bs-toggle="modal" data-bs-target="#inputModal" class="btn btn-primary d-flex align-items-center"
                            style=""><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                <path d="M16 19h6"></path>
                                <path d="M19 16v6"></path>
                             </svg>Tambah Auditor</button>
                        <table id="example" class="table table-striped mt-9" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($auditor as $a)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $a->nama_auditor }}
                                        </td>
                                        <td>
                                            {{ $a->nip_auditor }}
                                        </td>
                                        <td>
                                            {{ $a->email_auditor }}
                                        </td>
                                        <td>
                                            {{-- edit --}}
                                            {{-- <button href="" class="badge bg-warning border-0"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5"></path>
                                                <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                                             </svg></button> --}}
                                            {{-- delete --}}
                                            <button class="badge bg-danger border-0" data-id="{{ $id }}" data-auditor="{{ $a->id }}" onclick=""
                                                data-bs-toggle="modal" data-bs-target="#confirmDelete"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5"></path>
                                                <path d="M22 22l-5 -5"></path>
                                                <path d="M17 22l5 -5"></path>
                                             </svg></button>
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

    <div id="inputModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Auditor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('input.store', $id) }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="mb-3">
                            <label for="nip_auditor" class="form-label">NIP</label>
                            <input type="search" class="form-control" id="autocomplete_user_nip" autocomplete="new-search" name="nip_auditor" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input id="nama" class="form-control" type="text" name="nama" required/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
        $('#autocomplete_user_nip').blur((e)=>{
        let nip = $('#autocomplete_user_nip').val();
        let name
        fetch('http://127.0.0.1:8000/api/users')
            .then((response) => response.json())
            .then((response) => {
                name = response.find((user) => user.nip == nip)
                console.log(name)
                $('#nama').val(name.display_name);
            })
    })

    //Confirm Delete
    $('#confirmDelete').on('show.bs.modal', function (e) {
            var audit = $(e.relatedTarget).data('id');
            var auditor = $(e.relatedTarget).data('auditor');
            console.log(audit);
            console.log(auditor);
            $(e.currentTarget).find('#form-delete').attr('action', '/input-auditor/' + audit + '/input/' + auditor);
        });
    </script>
@endsection
