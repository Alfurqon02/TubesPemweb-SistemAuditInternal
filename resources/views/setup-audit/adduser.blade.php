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
        <div class="col d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Setup User</h5>
                        </div>
                    </div>
                    {{-- Add Content Here! --}}
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary d-flex align-items-center"
                        style="width: 20%"><svg xmlns="http://www.w3.org/2000/svg"
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
                        </svg>Tambah User</a>

                    <table id="example" class="table table-striped mt-9" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>NIP</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->nip }}</td>
                                <td>{{ $user->roles->first()->name ?? 'N/A' }}</td>
                                <td>
                                    <!-- Edit Button -->


                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form>
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
{{-- Confirm delete modal --}}
<div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="POST" class="d-inline" id="form-delete">
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
$('#confirmDelete').on('show.bs.modal', function(e) {
    var id_periode = $(e.relatedTarget).data('id');
    console.log(id_periode);
    $(e.currentTarget).find('#form-delete').attr('action', 'setup-audit/' + id_periode);
})
</script>
@endsection