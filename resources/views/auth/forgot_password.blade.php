@extends('layouts.auth')

@section('title')
    @lang('Lấy lại mật khẩu')
@endsection

@section('content')
    <div class="row w-100 mx-0 auth-page">
        <div class="auth-form-wrapper px-4 py-5">
            <div class="mb-4">
                <h4 class="text-center subtitle mt-4">Reset Your Password</h4>
                <p class="mt-3">Don't worry. We'll email you instructions to reset your password. If you don't have access to your email anymore, please
                    <a href="#" target="_blank">contact our support</a> to recover your account.</p>
            </div>
            <form class="forms-sample" method="post" action="{{ route('postEmail') }}" id="forgot-password-form">
                @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger text-center mb-3 show-errors">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="form-group">
                    <label for="email" class="font-size-small required">
                        Email
                    </label>
                    <input type="text" class="form-control"
                           name="email" value="{{ old('email') }}" id="email"
                           placeholder="You email address..." autofocus>
                </div>

                <div class="row">
                    <div class="col-7 col-sm-6">
                        <button class="btn btn-primary font-weight-semi font-size-large btn-sign-in" type="submit">
                            Reset Password
                        </button>
                    </div>
                    <div class="col-5 col-sm-6 pt-2">
                        <a href="{{ route('auth.show-form-login') }}" class="text-underline sub-active">
                            Return to login
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
