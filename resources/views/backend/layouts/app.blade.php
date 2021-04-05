<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="/css/backend/app.css">
    <style>
        .bg-gradient-primary {
            background-color: #357ee8 !important;
            background-image: linear-gradient(
                180deg, #357ee8 10%, #357ee8 100%);
            background-size: cover !important;
        }
        .btn-primary {
            color: #fff;
            background-color: #357ee8!important;
            border-color: #357ee8!important;
        }
        .btn-info {
            color: #fff;
            background-color: #357ee8!important;
            border-color: #357ee8!important;
        }
        a {
            color: #2b9c9d;
            text-decoration: none;
            background-color: transparent;
        }
    </style>
    @yield('css')
</head>
<body>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('backend.includes.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('backend.includes.header')
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid mt-4">
                    @include('share.alerts.messages')
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('backend.includes.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('share.modals.logout')
    <script src="/js/backend/app.js"></script>
    @yield('script')
</body>
</html>
