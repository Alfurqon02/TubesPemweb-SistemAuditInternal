<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>UNS Audit System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicons -->
        <link href="{{ url("landing-assets/img/favicon.png") }}" rel="shortcut icon">
        <link href="{{ url("landing-assets/img/apple-touch-icon.png") }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
        <!-- Vendor CSS Files -->
        <link href="{{ url("landing-assets/vendor/aos/aos.css") }}" rel="stylesheet">
        <link href="{{ url("landing-assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
        <link href="{{ url("landing-assets/vendor/bootstrap-icons/bootstrap-icons.css" ) }}"rel="stylesheet">
        <link href="{{ url("landing-assets/vendor/boxicons/css/boxicons.min.css") }}" rel="stylesheet">
        <link href="{{ url("landing-assets/vendor/glightbox/css/glightbox.min.css") }}" rel="stylesheet">
        <link href="{{ url("landing-assets/vendor/remixicon/remixicon.css") }}" rel="stylesheet">
        <link href="{{ url("landing-assets/vendor/swiper/swiper-bundle.min.css") }}" rel="stylesheet">
    
        <!-- Template Main CSS File -->
        <link href="{{ url("landing-assets/css/style.css") }}" rel="stylesheet">

    </head>
    <body>
        @include('landing-page.layouts.header')
        @yield('content')
        @include('landing-page.layouts.footer')

        <!-- Vendor JS Files -->
        <script src="{{ url("landing-assets/vendor/aos/aos.js") }}"></script>
        <script src="{{ url("landing-assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ url("landing-assets/vendor/glightbox/js/glightbox.min.js") }}"></script>
        <script src="{{ url("landing-assets/vendor/isotope-layout/isotope.pkgd.min.js") }}"></script>
        <script src="{{ url("landing-assets/vendor/swiper/swiper-bundle.min.js") }}"></script>
        <script src="{{ url("landing-assets/vendor/waypoints/noframework.waypoints.js") }}"></script>
        <script src="{{ url("landing-assets/vendor/php-email-form/validate.js") }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ url("landing-assets/js/main.js") }}"></script>

    </body>
</html>