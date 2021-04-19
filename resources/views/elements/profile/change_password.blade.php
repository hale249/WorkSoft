@extends('layouts.app')

@section('title', __('labels.pages.backend.profile.title.change_password'))

@section('content')
    <div class="card">
        <form action="{{ route('profile.change_password') }}" method="POST">
            @method('put')
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-0">
                    Thay đổi mật khẩu
                    <small class="text-muted">{{ $user->name }}</small>
                </h4>
                <hr>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="old_password">Mật khẩu hiện tại</label>

                    <div class="col-md-10">
                        <input class="form-control" type="password" name="old_password" id="old_password" value="" placeholder="{{ __('Nhập mật khẩu hiện tại ...') }}" maxlength="191" required="" autofocus="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="password">Mật khẩu mới</label>

                    <div class="col-md-10">
                        <input class="form-control" type="password" name="password" id="password" placeholder="{{ __('Nhập mật khẩu mới ...') }}" maxlength="191" required="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="password-confirmation">Nhập lại mật khẩu</label>

                    <div class="col-md-10">
                        <input class="form-control" type="password" name="password_confirmation" id="password-confirmation" placeholder="Nhaajpp lại mật khẩu ..." maxlength="191" required="">
                    </div><!--col-->
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
                    </div>

                    <div class="col text-right">
                        <button type="submit" class="btn btn-success btn-sm">Lưu</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
