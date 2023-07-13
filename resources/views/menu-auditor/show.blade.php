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
                                <h2 class="card-title fw-semibold">Setup File</h2>
                            </div>
                        </div>
                        <p>File yang Harus Diunggah Auditee</p>
                        <hr>
                        <form action="{{ route('audit.store', $id) }}" method="POST">
                            @csrf
                            @foreach ($jenis_file as $file)
                                <div>
                                    <label class="cyberpunk-checkbox-label">
                                        <input name="id_file_audit[]" class="cyberpunk-checkbox" type="checkbox"
                                            value="{{ $file->id }}"
                                            @foreach ($checked as $check)
                                            @if ($check->id_file == $file->id)
                                                @checked(true)
                                            @endif @endforeach>
                                        {{ $file->nama }}</label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary mt-3 d-flex ms-auto">Set</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <p>File Ungaahan Auditee</p>
                    <hr>
                    @foreach ($checked as $check)
                    <a href="">{{ $check->nama_file }}</a>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>


    </div>
@endsection
