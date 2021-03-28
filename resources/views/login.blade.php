<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('labels.pages.login.title')</title>
    <!-- Styles -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/backend/app.css">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng nhập</h1>
                                    </div>
                                    <form class="user" action="{{ route('auth.login') }}" method="post">
                                        @csrf
                                        @include('share.alerts.messages')
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Nhập tài khoản">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Nhập mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input name="remember" type="checkbox" class="custom-control-input" id="remember">
                                                <label class="custom-control-label" for="remember">Ghi nhớ</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Đăng nhập
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Lấy lại mật  khẩu</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="#">Tạo tài khoản</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>

</html>
