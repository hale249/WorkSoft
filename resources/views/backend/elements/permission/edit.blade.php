@extends('backend.layouts.app')

@section('title', __('Chỉnh sửa vai trò'))

@section('content')
    <div class="card">
        <form action="{{ route('backend.permissions.update', $permission->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-0ò">
                    @lang('Quản lý vai trò')
                    <small class="text-muted">@lang('Chỉnh sửa vài trò')</small>
                </h4>
                <hr>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">@lang('Tên vai trò')</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $permission->name }}" placeholder="{{ __('Nhập tên ...') }}" maxlength="191" required="" autofocus="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">@lang('Nội dung')</label>

                    <div class="col-md-10">
                        <textarea class="form-control" name="description" id="description" placeholder="{{ __('Nhập nội dung ...') }}" rows="5">{{ $permission->description }}</textarea>
                    </div><!--col-->
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('backend.category.index') }}" class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
                    </div>

                    <div class="col text-right">
                        <button type="submit" class="btn btn-success btn-sm">@lang('labels.pages.backend.category.form.edit_submit')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
