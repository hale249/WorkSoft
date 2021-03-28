@extends('backend.layouts.app')

@section('title', __('Chỉnh sửa người dùng'))

@section('content')
    <div class="card">
        <form action="{{ route('backend.users.update', $user->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-0">
                    @lang('Người dùng')
                    <small class="text-muted">@lang('Chỉnh sửa')</small>
                </h4>
                <hr>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">@lang('First name')</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="first_name" value="{{$user->first_name ?? old('first_name') }}" placeholder="{{ __('First name') }}" maxlength="191" required="" autofocus="">
                    </div><!--col-->
                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">@lang('Last name')</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="last_name" id="name" value="{{$user->last_name ?? old('last_name') }}" placeholder="{{ __('Last name') }}" maxlength="191" required="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="email">@lang('labels.pages.backend.users.form.email')</label>

                    <div class="col-md-10">
                        <input class="form-control" type="email" name="email" id="email" disabled value="{{ $user->email }}" placeholder="{{ __('labels.pages.backend.users.form.placeholder.email') }}" maxlength="191" required="" autofocus="">
                    </div><!--col-->
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('backend.users.index') }}" class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
                    </div>

                    <div class="col text-right">
                        <button type="submit" class="btn btn-success btn-sm">@lang('labels.pages.backend.users.form.update_submit')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
