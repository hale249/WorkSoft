@extends('backend.layouts.app')

@section('title', __('labels.pages.backend.category.title.create'))

@section('content')
    <div class="card">
        <form action="{{ route('backend.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-0">
                    @lang('labels.pages.backend.category.title.management')
                    <small class="text-muted">@lang('labels.pages.backend.category.title.create')</small>
                </h4>
                <hr>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">@lang('labels.pages.backend.category.form.name')</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('labels.pages.backend.category.form.placeholder.name') }}" maxlength="191" required="" autofocus="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">@lang('labels.pages.backend.category.form.description')</label>

                    <div class="col-md-10">
                        <textarea class="form-control" name="description" id="description" placeholder="{{ __('labels.pages.backend.category.form.placeholder.description') }}" rows="5">{{ old('description') }}</textarea>
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="image">@lang('labels.pages.backend.category.form.image')</label>

                    <div class="col-md-10">
                        <input type="file" name="image" id="image">
                    </div><!--col-->
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('backend.category.index') }}" class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
                    </div>

                    <div class="col text-right">
                        <button type="submit" class="btn btn-success btn-sm">@lang('labels.pages.backend.category.form.create_submit')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
