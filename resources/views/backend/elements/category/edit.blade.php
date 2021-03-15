@extends('backend.layouts.app')

@section('title', __('labels.pages.backend.category.title.edit'))

@section('content')
    <div class="card">
        <form action="{{ route('backend.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-0">
                    @lang('labels.pages.backend.category.title.management')
                    <small class="text-muted">@lang('labels.pages.backend.category.title.edit')</small>
                </h4>
                <hr>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">@lang('labels.pages.backend.category.form.name')</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $category->name }}" placeholder="{{ __('labels.pages.backend.category.form.placeholder.name') }}" maxlength="191" required="" autofocus="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">@lang('labels.pages.backend.category.form.description')</label>

                    <div class="col-md-10">
                        <textarea class="form-control" name="description" id="description" placeholder="{{ __('labels.pages.backend.category.form.placeholder.description') }}" rows="5">{{ $category->description }}</textarea>
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="image">@lang('labels.pages.backend.category.form.image')</label>

                    <div class="col-md-10">
                        <input type="file" name="image" id="image">
                        <p class="mt-3"><img src="{{ $category->image }}" width="100" alt=""></p>
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
