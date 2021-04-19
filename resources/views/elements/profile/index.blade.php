@extends('layouts.app')

@section('title', __('Cập nhật thông tin cá nhân'))

@section('content')
    <div class="card">
        <form action="{{ route('profile.update') }}" method="POST">
            @method('put')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title mb-0">
                            Cập nhật thông tin cá nhân
                            <small class="text-muted">{{ $user->name }}</small>
                        </h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('profile.show_form_change_password') }}" class="btn btn-primary btn-sm">Thay đổi mật khẩu</a>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="email">Email</label>

                    <div class="col-md-10">
                        <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}" disabled>
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Tên</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}" placeholder="{{ __('Nhập tên ...') }}" maxlength="191" required="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="ma_can_bo">Mã cán bộ</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="ma_can_bo" id="ma_can_bo" value="{{ $user->ma_can_bo }}" placeholder="{{ __('Nhập ma can bo') }}">
                    </div><!--col-->
                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="chuc_vu">Chức vụ</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="chuc_vu" id="chuc_vu" value="{{ $user->chuc_vu }}" placeholder="{{ __('Nhập chức vụ') }}">
                    </div><!--col-->
                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="hoc_vi">Học vị</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="hoc_vi" id="hoc_vi" value="{{ $user->hoc_vi }}" placeholder="{{ __('Nhập học vị') }}">
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
                <div class="form-group row">
                    <label class="col-md-2 form-control-label"></label>
                    <div class="col-md-10">
                        @if(!empty($user->avatar))
                            <img src="{{ $user->avatar }}" width="100px" height="100px">
                        @endif
                    </div>
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
