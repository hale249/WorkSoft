@extends('backend.layouts.app')

@section('title', __('Lập lịch') . ' - ' . $meeting->name)

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-0">
                Lập lịch
                <small class="text-muted">Chi tiết lập lịch - {{ $meeting->name }}</small>
            </h4>
            <hr>
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Tên cuộc họp</label>

                <div class="col-md-10">
                    {{ $meeting->name }}
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Ngày họp</label>

                <div class="col-md-10">
                    {{ $meeting->date_meeting }}
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">Thời gian</label>

                <div class="col-md-10">
                    {{ $meeting->time_start_end }}
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="description">Nội dung</label>

                <div class="col-md-10">
                    @if($meeting->description)
                        {{ $meeting->description }}
                    @else
                        @lang('labels.general.empty')
                    @endif
                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="name">File dính kèm</label>

                <div class="col-md-10">
                    @if($meeting->document_file)
                    <p class="mt-3"><img src="{{ $meeting->image }}" width="100" alt=""></p>
                    @else
                        @lang('labels.general.empty')
                    @endif
                </div><!--col-->
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <a href="{{ route('backend.meeting.index') }}" class="btn btn-success btn-sm">@lang('labels.general.back')</a>
                </div>

            </div>
        </div>
    </div>
@endsection
