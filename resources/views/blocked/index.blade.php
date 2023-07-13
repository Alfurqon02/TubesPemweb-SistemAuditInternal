@extends('blocked.layouts.main')

@section('container')
<div class="container-fluid">
    <!--  Row 1 -->
    <center>

        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <h5 class="card-title fw-semibold">BLOCKED!</h5>
                        <h5 class="card-title fw-semibold">HANYA ROLE TERTENTU YANG DAPAT MENGAKSES HALAMAN INI!
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="py-6 px-6 text-center">
      <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
    </div> --}}
</div>
@endsection