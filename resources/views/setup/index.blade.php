@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Menu</h5>
                        </div>
                    </div>
                    {{-- Add Content Here! --}}
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <a href="{{ route('setup-periode.index') }}" class="w-100">
                                <div class="card w-100" style="background-color: red">
                                    <div class="card-body">
                                        <div class="d-sm-flex d-block align-items-center justify-content-between">
                                            <div class="mb-3 mb-sm-0 d-flex align-items-center">
                                                <h1 class="p-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-home-cog text-white"
                                                        width="50" height="50" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h1.6"></path>
                                                        <path d="M20 11l-8 -8l-9 9h2v7a2 2 0 0 0 2 2h4.159"></path>
                                                        <path d="M18 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M18 14.5v1.5"></path>
                                                        <path d="M18 20v1.5"></path>
                                                        <path d="M21.032 16.25l-1.299 .75"></path>
                                                        <path d="M16.27 19l-1.3 .75"></path>
                                                        <path d="M14.97 16.25l1.3 .75"></path>
                                                        <path d="M19.733 19l1.3 .75"></path>
                                                    </svg>
                                                </h1>
                                                <h1 class="ms-9" style="color: whitesmoke;">Setup Periode</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <a href="{{ route('setup-unit.index') }}" aria-expanded="false" class="w-100">
                                <div class="card w-100" style="background-color: green;">
                                    <div class="card-body">
                                        <div class="d-sm-flex d-block align-items-center justify-content-between">
                                            <div class="mb-3 mb-sm-0 d-flex align-items-center">
                                                <h1 class="p-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-calendar-cog text-white"
                                                        width="50" height="50" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M12 21h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5">
                                                        </path>
                                                        <path d="M16 3v4"></path>
                                                        <path d="M8 3v4"></path>
                                                        <path d="M4 11h16"></path>
                                                        <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                        <path d="M19.001 15.5v1.5"></path>
                                                        <path d="M19.001 21v1.5"></path>
                                                        <path d="M22.032 17.25l-1.299 .75"></path>
                                                        <path d="M17.27 20l-1.3 .75"></path>
                                                        <path d="M15.97 17.25l1.3 .75"></path>
                                                        <path d="M20.733 20l1.3 .75"></path>
                                                    </svg>
                                                </h1>
                                                <h1 class="ms-9" style="color: whitesmoke">Setup Unit</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection