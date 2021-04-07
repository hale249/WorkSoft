@extends('layouts.app')

@section('title', __('Công việc') . ' - ' . $job->name)

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-0">
                Công việc
                <small class="text-muted">Chi tiết công việc - {{ $job->name }}</small><br>
                <small class="text-muted">Người tạo - {{ !empty($job->createdBy) ? $job->createdBy->full_name : '' }}</small>
            </h4>
            <hr>
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Tên công việc</label>

                <div class="col-md-10">
                    {{ $job->name }}
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Xếp loại đầu việc</label>

                <div class="col-md-10">
                    {{ $job->job_ranting }}
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Người phụ trách công việc</label>

                <div class="col-md-10">
                    {{ !empty($job->user) ? $job->user->full_name : '' }}
                </div><!--col-->
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Điểm</label>

                <div class="col-md-10">
                    {{ $job->point_of_work }}
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Người hỗ trợ</label>

                <div class="col-md-10">
                    {{ !empty($job->personSupport) ? $job->personSupport->full_name : '' }}
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Điểm hỗ trợ</label>

                <div class="col-md-10">
                    {{ $job->point_of_work_sp }}
                </div><!--col-->
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Nngười quản lý công việc</label>

                <div class="col-md-10">
                    {{ !empty($job->personMission) ? $job->personMission->full_name : '' }}
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Làm đến</label>

                <div class="col-md-10">
                    {{ $job  ->deadline }}
                </div><!--col-->
            </div>


            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="description">Nội dung</label>

                <div class="col-md-10">
                    @if($job->description)
                        {{ $job->description }}
                    @else
                        @lang('labels.general.empty')
                    @endif
                </div><!--col-->
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="description">Content</label>

                <div class="col-md-10">
                    @if($job->content)
                        {!! $job->content !!}
                    @else
                        @lang('labels.general.empty')
                    @endif
                </div><!--col-->
            </div>

        {{--    <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">File dính kèm</label>

                <div class="col-md-10">
                    @if($meeting->document_file)
                        <p class="mt-3"><img src="{{ $meeting->image }}" width="100" alt=""></p>
                    @else
                        @lang('labels.general.empty')
                    @endif
                </div><!--col-->
            </div>--}}
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <a href="{{ route('backend.jobs.index') }}"
                       class="btn btn-success btn-sm">@lang('labels.general.back')</a>
                </div>

                <div class="col text-right">
                    <a href="{{ route('backend.job_task.index', $job->id) }}" class="btn btn-primary btn-sm">@lang('Item task')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
