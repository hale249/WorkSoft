@extends('backend.layouts.app')

@section('title', __('labels.pages.backend.category.title.show') . ' - ' . $category->name)

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-0">
                @lang('labels.pages.backend.category.title.management')
                <small class="text-muted">@lang('labels.pages.backend.category.title.show') - {{ $category->name }}</small>
            </h4>
            <hr>
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">@lang('labels.pages.backend.category.form.name')</label>

                <div class="col-md-10">
                    {{ $category->name }}
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="description">@lang('labels.pages.backend.category.form.image')</label>

                <div class="col-md-10">
                    <img src="{{ \Request::root() . '/' . $category->image }}" width="100" alt="">
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="description">@lang('labels.pages.backend.category.form.description')</label>

                <div class="col-md-10">
                    @if($category->description)
                        {{ $category->description }}
                    @else
                        @lang('labels.general.empty')
                    @endif
                </div><!--col-->
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <a href="{{ route('backend.category.index') }}" class="btn btn-success btn-sm">@lang('labels.general.back')</a>
                </div>

                <div class="col text-right">
                    <a href="{{ route('backend.category.edit', $category->id) }}" class="btn btn-primary btn-sm">@lang('labels.general.edit')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
