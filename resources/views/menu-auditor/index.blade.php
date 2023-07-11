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
                                    <th>NIP Ketua SPI</th>
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
                                            {{ $a->nip_ketua_spi }}
                                        </td>
                                        <td>
                                            {{-- tambah auditor --}}
                                            <a href="{{ route('input.index', $a->id) }}" class="badge bg-success"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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

    <div id="showDetail" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Audit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Nama Periode</th>
                            <td id="nama_periode"></td>
                        </tr>
                        <tr>
                            <th>Nama Ketua SPI</th>
                            <td id="nama_ketua_spi"></td>
                        </tr>
                        <tr>
                            <th>NIP Ketua SPI</th>
                            <td id="nip_ketua_spi"></td>
                        </tr>
                        <tr>
                            <th>Nama Tim Auditor</th>
                            <td id="nama_tim"></td>
                        </tr>
                        <tr>
                            <th>Ketua Tim Auditor</th>
                            <td id="nama_ketua_tim_auditor"></td>
                        </tr>
                        <tr>
                            <th>NIP Ketua Tim Auditor</th>
                            <td id="nip_ketua_tim_auditor"></td>
                        </tr>
                        <tr>
                            <th>Unit</th>
                            <td id="nama_unit"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Audit</th>
                            <td id="tanggal_audit"></td>
                        </tr>
                        <div>
                            <tr>
                                <th>Auditor</th>
                                <td id="auditor"></td>
                            </tr>
                        </div>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        // Detail
        $('#showDetail').on('show.bs.modal', function(e) {
            var id_pesanan = $(e.relatedTarget).data('id');
            const url = '{{ url('api/audit') }}';

            $.get(url, function(response) {
                response = JSON.parse(response)
                for (let i = 0; i < response.length; i++) {
                    var nama_periode = response[i].nama_periode;
                    var nama_ketua_spi = response[i].nama_ketua_spi;
                    var nip_ketua_spi = response[i].nip_ketua_spi;
                    var nama_tim = response[i].nama_tim;
                    var nama_ketua_tim_auditor = response[i].nama_ketua_tim_auditor;
                    var nip_ketua_tim_auditor = response[i].nip_ketua_tim_auditor;
                    var nama_unit = response[i].nama_unit;
                    var auditor = response[i].auditor;
                    var tanggal_audit = new Date(response[i].tanggal_audit).toLocaleDateString('en-US');
                    console.log(response[i])
                    // $(e.currentTarget).find('td#nama').text(nama).attr('class', 'w-75');
                    $(e.currentTarget).find('td#nama_periode').text(nama_periode);
                    $(e.currentTarget).find('td#nama_ketua_spi').text(nama_ketua_spi);
                    $(e.currentTarget).find('td#nip_ketua_spi').text(nip_ketua_spi);
                    $(e.currentTarget).find('td#nama_tim').text(nama_tim);
                    $(e.currentTarget).find('td#nama_ketua_tim_auditor').text(nama_ketua_tim_auditor);
                    $(e.currentTarget).find('td#nip_ketua_tim_auditor').text(nip_ketua_tim_auditor);
                    $(e.currentTarget).find('td#nama_unit').text(nama_unit);
                    if ($(e.currentTarget).find('td#auditor').text() == "") {
                        $(e.currentTarget).find('td#auditor').text(auditor);
                    } else {
                        var lastAuditor = $(e.currentTarget).find('td#auditor').text().split(', ');
                        if (!lastAuditor.includes(auditor)) {
                            lastAuditor.push(menu);
                            $(e.currentTarget).find('td#auditor').text(lastAuditor.join(', '));
                        }
                    }
                    $(e.currentTarget).find('td#tanggal_audit').text(tanggal_audit);
                }

            });
        });

        $('#showDetail').on('hide.bs.modal', function(e) {
            $(e.currentTarget).find('td#nama_periode').text("");
            $(e.currentTarget).find('td#nama_ketua_spi').text("");
            $(e.currentTarget).find('td#nip_ketua_spi').text("");
            $(e.currentTarget).find('td#nama_tim').text("");
            $(e.currentTarget).find('td#nama_ketua_tim_auditor').text("");
            $(e.currentTarget).find('td#nip_ketua_tim_auditor').text("");
            $(e.currentTarget).find('td#nama_unit').text("");
            $(e.currentTarget).find('td#auditor').text("");
            $(e.currentTarget).find('td#tanggal_audit').text("");
        });
    </script> --}}
@endsection
