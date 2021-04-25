@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/logo-humg.png') }}" alt="Logo" width="100"/>
                </div>
                <div class="mb-4"><h4 class="text-center subtitle mt-4">Reset Your Password</h4>
                    <p class="mt-3">Almost done. Enter your new password, and you're good to go.</p></div>
                <form class="forms-sample ml-3" method="POST" action="{{ route('updatePassword', $token) }}">
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="password" class="font-size-small required">
                            New password
                        </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" id="password" autocomplete="current-password"
                               placeholder="Typing password...">
                        @error('password')
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-size-small required">
                            Confirm new password
                        </label>
                        <input type="password"
                               class="form-control @error('password_confirmation') is-invalid @enderror"
                               name="password_confirmation" id="password_confirmation"
                               autocomplete="current-password"
                               placeholder="Typing confirmation password...">
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                        @enderror
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary font-weight-semi font-size-large btn-sign-in w-100">
                            Reset password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
