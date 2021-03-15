@extends('backend.layouts.app')

@section('title', __('labels.pages.backend.users.title.change_password'))

@section('content')
    <div class="card">
        <form action="{{ route('backend.users.change_password', $user->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-0">
                    @lang('labels.pages.backend.users.title.management')
                    <small class="text-muted">@lang('labels.pages.backend.users.title.change_password')</small>
                </h4>
                <hr>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="password">@lang('labels.pages.backend.users.form.password')</label>

                    <div class="col-md-10">
                        <input class="form-control" type="password" name="password" id="password" placeholder="{{ __('labels.pages.backend.users.form.placeholder.password') }}" maxlength="191" required="" autofocus="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="password-confirmation">@lang('labels.pages.backend.users.form.password_confirmation')</label>

                    <div class="col-md-10">
                        <input class="form-control" type="password" name="password_confirmation" id="password-confirmation" placeholder="{{ __('labels.pages.backend.users.form.placeholder.password_confirmation') }}" maxlength="191" required="" autofocus="">
                    </div><!--col-->
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('backend.users.index') }}" class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
                    </div>

                    <div class="col text-right">
                        <button type="submit" class="btn btn-success btn-sm">@lang('labels.pages.backend.users.form.change_password_submit')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
