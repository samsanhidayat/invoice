<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/disk/assets') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/disk/assets') }}/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet"
        href="{{ asset('assets/disk/assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/disk/assets') }}/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/disk/assets') }}/images/favicon.png" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    @livewireStyles

</head>

<body>

    <div class="container-scroller">
        @include('layouts.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.admin.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('contents')
                </div>
            </div>

        </div>
    </div>


    <script src="{{ asset('assets/disk/assets') }}/vendors/base/vendor.bundle.base.js"></script>
    <script src="{{ asset('assets/disk/assets') }}/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('assets/disk/assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('assets/disk/assets') }}/js/off-canvas.js"></script>
    <script src="{{ asset('assets/disk/assets') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('assets/disk/assets') }}/js/template.js"></script>
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/disk/assets') }}/js/dashboard.js"></script>
    <script src="{{ asset('assets/disk/assets') }}/js/data-table.js"></script>
    <script src="{{ asset('assets/disk/assets') }}/js/jquery.dataTables.js"></script>
    <script src="{{ asset('assets/disk/assets') }}/js/dataTables.bootstrap4.js"></script>
    <!-- End custom js for this page-->
    <!-- End custom js for this page-->
    @livewireScripts

</body>

</html>
