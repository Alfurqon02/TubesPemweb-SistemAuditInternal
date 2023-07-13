<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SiAuditin</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ url('/assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ url('/assets/css/checkbox.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"
        integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script src="{{ url('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo_configurator.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/autocomplete.min.js') }}"></script>
    <script src="{{ asset('assets/js/form_autocomplete.js') }}"></script>

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('dashboard.layouts.sidebar')
        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('dashboard.layouts.navbar')
            @yield('container')
        </div>
    </div>
    {{-- <script src="{{ url("/assets/libs/jquery/dist/jquery.min.js") }}"></script> --}}
    <script src="{{ url('/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ url('/assets/js/app.min.js') }}"></script>
    <script src="{{ url('/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ url('/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ url('/assets/js/dashboard.js') }}"></script>


</body>

</html>
