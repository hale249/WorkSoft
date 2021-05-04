<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Styles -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
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

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->

                    @yield('content')
                </div>
            </div>

        </div>

    </div>

</div>
</body>

@yield('script')

</html>
