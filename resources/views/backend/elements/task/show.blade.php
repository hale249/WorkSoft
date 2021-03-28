@extends('backend.layouts.app')

@section('title', __('Lập lịch') . ' - ' . $task->name)

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-0">
                Nhiệm vụ
                <small class="text-muted">Chi tiết nhiệm vụ - {{ $task->name }}</small>
            </h4>
            <hr>
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Tên nhiệm vụ</label>

                <div class="col-md-10">
                    {{ $task->name }}
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Hạn đến</label>

                <div class="col-md-10">
                    {{ $task->deadline }}
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Trạng thái</label>

                <div class="col-md-10">
                    <span class="badge badge-pill" style="background-color: {{ $task->status->color }}; color: #000000">{{ $task->status->name }}</span>
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Nội dung</label>

                <div class="col-md-10">
                    @if($task->description)
                        {{ $task->description }}
                    @else
                        @lang('labels.general.empty')
                    @endif
                </div><!--col-->
            </div>
{{--
            <div class="form-group row">
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
                    <a href="{{ route('backend.job_task.index', ['id' => $job->id]) }}" class="btn btn-success btn-sm">@lang('labels.general.back')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
