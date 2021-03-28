@extends('backend.layouts.app')

@section('title', __('labels.pages.backend.profile.title.index'))

@section('content')
    <div class="card">
        <form action="{{ route('backend.profile.update') }}" method="POST">
            @method('put')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title mb-0">
                            @lang('labels.pages.backend.profile.title.index')
                            <small class="text-muted">{{ $user->name }}</small>
                        </h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('backend.profile.show_form_change_password') }}" class="btn btn-primary btn-sm">@lang('labels.pages.backend.profile.change_password_label')</a>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="email">@lang('labels.pages.backend.profile.form.email')</label>

                    <div class="col-md-10">
                        <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}" disabled>
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">First name</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" placeholder="{{ __('First name') }}" maxlength="191" required="" autofocus="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="last_name">Last name</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" placeholder="{{ __('Last name') }}" maxlength="191" required="">
                    </div><!--col-->
                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="phone_number">Số điện thoại</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ $user->phone_number }}" placeholder="{{ __('Nhập số điện thoại') }}" maxlength="15" required="">
                    </div><!--col-->
                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="birthday">Ngày sinh</label>

                    <div class="col-md-10">
                        <input class="form-control" type="date" name="birthday" id="birthday" value="{{ $user->birthday }}" placeholder="{{ __('Ngày sinh') }}">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="address">Địa chỉ</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="address" id="address" value="{{ $user->address }}" placeholder="{{ __('Dịa chỉ') }}">
                    </div><!--col-->
                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="avatar">Ảnh dại diện</label>

                    <div class="col-md-10">
                        <input type="file" name="avatar" id="avatar" placeholder="{{ __('Ảnh đại điện') }}">
                    </div><!--col-->
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('backend.dashboard.index') }}" class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
                    </div>

                    <div class="col text-right">
                        <button type="submit" class="btn btn-success btn-sm">@lang('labels.pages.backend.profile.form.edit_submit')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
