@extends('backend.layouts.app')

@section('title', __('Công việc') . ' - ' . $project->name)

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-0">
                Công việc
                <small class="text-muted">Chi tiết công việc - {{ $project->name }}</small>
            </h4>
            <hr>
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Tên công việc</label>

                <div class="col-md-10">
                    {{ $project->name }}
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Người làm</label>

                <div class="col-md-10">
                    {{ $project->user->full_name }}
                </div><!--col-->
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Làm đến</label>

                <div class="col-md-10">
                    {{ $project->deadline }}
                </div><!--col-->
            </div>


            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="description">Nội dung</label>

                <div class="col-md-10">
                    @if($project->description)
                        {{ $project->description }}
                    @else
                        @lang('labels.general.empty')
                    @endif
                </div><!--col-->
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="description">Content</label>

                <div class="col-md-10">
                    @if($project->content)
                        {!! $project->content !!}
                    @else
                        @lang('labels.general.empty')
                    @endif
                </div><!--col-->
            </div>

{{--            <div class="form-group row">--}}
{{--                <label class="col-md-2 form-control-label" for="name">File dính kèm</label>--}}

{{--                <div class="col-md-10">--}}
{{--                    @if($meeting->document_file)--}}
{{--                        <p class="mt-3"><img src="{{ $meeting->image }}" width="100" alt=""></p>--}}
{{--                    @else--}}
{{--                        @lang('labels.general.empty')--}}
{{--                    @endif--}}
{{--                </div><!--col-->--}}
{{--            </div>--}}
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <a href="{{ route('backend.projects.index') }}" class="btn btn-success btn-sm">@lang('labels.general.back')</a>
                </div>

                <div class="col text-right">
                    <a href="{{ route('backend.projects.edit', $project->id) }}" class="btn btn-primary btn-sm">@lang('labels.general.edit')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
