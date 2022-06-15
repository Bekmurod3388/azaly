<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>Admin</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/favicon/favicon.ico') }}"/>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fonts/boxicons.css') }}"/>
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/core.css') }}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/theme-default.css') }}"
          class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{ asset('/assets/css/demo.css') }}"/>
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/apex-charts/apex-charts.css') }}"/>
    @yield('link')
<!-- Page CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="{{asset('/asset/js/core/jquery.3.2.1.min.js')}}"></script>
    <!-- Fonts and icons -->
    <script src="{{asset('/asset/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {"families": ["Lato:300,400,700,900"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['{{asset("/asset/css/fonts.min.css")}}']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('/asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/asset/css/atlantis.min.css')}}">




    <!-- Helpers -->
    <script src="{{ asset('/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/assets/js/config.js') }}"></script>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
{{--        @include('admin.sidebar')--}}
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
        @include('admin.nav')
        <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
{{--                @include('alerts')--}}
                <div class="container-xxl flex-grow-1 container-p-y">
                     @yield('content')
                </div>
                <!-- Content -->
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<script src="{{ asset('/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('/assets/js/main.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('/assets/js/dashboards-analytics.js') }}"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="{{asset('/asset/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('/asset/js/core/popper.min.js')}}"></script>
<script src="{{asset('/asset/js/core/bootstrap.min.js')}}"></script>
<!-- jQuery UI -->
<script src="{{asset('/asset/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('/asset/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
<!-- jQuery Scrollbar -->
<script src="{{asset('/asset/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<!-- Chart JS -->
<script src="{{asset('/asset/js/plugin/chart.js/chart.min.js')}}"></script>
<!-- jQuery Sparkline -->
<script src="{{asset('/asset/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Chart Circle -->
<script src="{{asset('/asset/js/plugin/chart-circle/circles.min.js')}}"></script>
<!-- Datatables -->
<script src="{{asset('/asset/js/plugin/datatables/datatables.min.js')}}"></script>
<!-- Bootstrap Notify -->
<script src="{{asset('/asset/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<!-- jQuery Vector Maps -->
<script src="{{asset('/asset/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('/asset/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>
<!-- Sweet Alert -->
<script src="{{asset('/asset/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
<!-- Atlantis JS -->
<script src="{{asset('/asset/js/atlantis.min.js')}}">
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
@yield('script')
</body>
</html>
