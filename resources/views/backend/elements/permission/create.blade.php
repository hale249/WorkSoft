@extends('backend.layouts.app')

@section('title', __('Tạo vai trò'))

@section('content')
    <div class="card">
        <form action="{{ route('backend.permissions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-0">
                    @lang('Quản lý vai trò')
                    <small class="text-muted">@lang('Tạo vai trò')</small>
                </h4>
                <hr>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">@lang('Tên vai trò')</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('Nhập tên ...') }}" maxlength="191" required="" autofocus="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">@lang('Mô tả')</label>

                    <div class="col-md-10">
                        <textarea class="form-control" name="description" id="description" placeholder="{{ __('Nhập mô tả ...') }}" rows="5">{{ old('description') }}</textarea>
                    </div><!--col-->
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('backend.permissions.index') }}" class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
                    </div>

                    <div class="col text-right">
                        <button type="submit" class="btn btn-success btn-sm">@lang('labels.pages.backend.category.form.create_submit')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
