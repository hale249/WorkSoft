@extends('layouts.app')

@section('title', __('labels.pages.backend.profile.title.change_password'))

@section('content')
    <div class="card">
        <form action="{{ route('backend.profile.change_password') }}" method="POST">
            @method('put')
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-0">
                    @lang('labels.pages.backend.profile.title.change_password')
                    <small class="text-muted">{{ $user->name }}</small>
                </h4>
                <hr>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="old_password">@lang('labels.pages.backend.profile.form.old_password')</label>

                    <div class="col-md-10">
                        <input class="form-control" type="password" name="old_password" id="old_password" value="" placeholder="{{ __('labels.pages.backend.profile.form.placeholder.old_password') }}" maxlength="191" required="" autofocus="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="password">@lang('labels.pages.backend.profile.form.password')</label>

                    <div class="col-md-10">
                        <input class="form-control" type="password" name="password" id="password" placeholder="{{ __('labels.pages.backend.profile.form.placeholder.password') }}" maxlength="191" required="" autofocus="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="password-confirmation">@lang('labels.pages.backend.profile.form.password_confirmation')</label>

                    <div class="col-md-10">
                        <input class="form-control" type="password" name="password_confirmation" id="password-confirmation" placeholder="{{ __('labels.pages.backend.profile.form.placeholder.password_confirmation') }}" maxlength="191" required="" autofocus="">
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
