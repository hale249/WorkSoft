@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Đăng nhập</h1>
                </div>
                <form class="user" action="{{ route('auth.login') }}" method="post">
                    @csrf
                    @include('share.alerts.messages')
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
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
                    <a class="small" href="{{ route('show-form-email') }}">Lấy lại mật  khẩu</a>
                </div>
            </div>
        </div>
    </div>
@endsection
