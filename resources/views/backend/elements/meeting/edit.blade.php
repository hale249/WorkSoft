@extends('backend.layouts.app')

@section('title', __('Sửa lập lịch'))

@section('content')
    <div class="card">
        <form action="{{ route('backend.meeting.update', $meeting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <h4 class="card-title mb-0">
                    @lang('Quản lý lập lịch')
                    <small class="text-muted">@lang('Sửa lập lịch')</small>
                </h4>
                <hr>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Tên cuộc họp</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $meeting->name ?? old('name') }}" placeholder="{{ __('labels.pages.backend.category.form.placeholder.name') }}" required="" autofocus="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="date_meeting">Ngày họp</label>

                    <div class="col-md-10">
                        <input class="form-control" type="date" name="date_meeting" value="{{ $meeting->date_meeting ?? old('date_meeting') }}" id="date_meeting" placeholder="Nhập ngày họp ..."  required="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="start_meeting">Thời gian bắt đầu</label>

                    <div class="col-md-10">
                        <input class="form-control" type="time" name="start_meeting" value="{{ $meeting->start_meeting ?? old('start_meeting') }}" id="start_meeting" placeholder="Thời gian bắt đầu ..." required="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="end_meeting">Thời gian kết thúc</label>

                    <div class="col-md-10">
                        <input class="form-control" type="time" name="end_meeting" value="{{ $meeting->end_meeting ?? old('end_meeting') }}" id="end_meeting" placeholder="Thời gian kết thúc ..." required="">
                    </div><!--col-->
                </div>

              {{--  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">Thành viên tham gia</label>

                    <div class="col-md-10">
                        <select class="parent_filter_select2 pull-right form-control" id="parent_filter_select2" multiple="multiple" name="select_project">
                            <option value="all">All</option>
                            <option value="Option A">Option A</option>
                            <option value="Option B">Option B</option>
                            <option value="Option C">Option C</option>
                            <option value="Option D">Option D</option>
                        </select>
                    </div><!--col-->
                </div>--}}

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">Nội dung cuộc họp</label>

                    <div class="col-md-10">
                        <textarea class="form-control" name="description" id="description" placeholder="Nhập nội dung cuộc họp" rows="8">{{ $meeting->description ?? old('description') }}</textarea>
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="document_file">File dính kèm <small>(nếu có)</small></label>

                    <div class="col-md-10">
                        <input type="file" name="document_file" id="document_file">
                        <p class="mt-3"><img src="{{ $meeting->image }}" width="100" alt=""></p>
                    </div><!--col-->
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('backend.meeting.index') }}" class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
                    </div>

                    <div class="col text-right">
                        <button type="submit" class="btn btn-success btn-sm">@lang('labels.pages.backend.category.form.edit_submit')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
