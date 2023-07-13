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
                        <table id="example" class="table table-striped mt-9" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Periode</th>
                                    <th>Unit</th>
                                    <th>Tanggal Audit</th>
                                    <th>Ketua SPI</th>
                                    <th>Ketua Tim</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($audit as $a)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $a->nama_periode }}
                                        </td>
                                        <td>
                                            {{ $a->nama_unit }}
                                        </td>
                                        <td>
                                            {{ $a->tanggal_audit }}
                                        </td>
                                        <td>
                                            {{ $a->nama_ketua_spi }}
                                        </td>
                                        <td>
                                            {{ $a->nama_ketua_tim }}
                                        </td>
                                        <td>
                                            {{-- setup file --}}
                                            <a href="{{ route('upload.create', $a->id) }}" class="badge bg-success"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
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
@endsection
