@extends('backend.layouts.app')

@section('title', __('Tạo nhiệm vụ'))

@section('content')
    <div class="card">
        <form action="{{ route('backend.project_task.store', ['id' => $project->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-0">
                    Nhiệm vụ
                    <small class="text-muted">Tạo nhiệm vụ</small>
                </h4>
                <hr>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Tên nhiệm vụ</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nhập tên nhiệm vụ" required="" autofocus="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="deadline">Ngày hết hạn</label>

                    <div class="col-md-10">
                        <input class="form-control" type="date" name="deadline" value="{{ old('deadline') }}" id="deadline" placeholder="Nhập ngày họp ..."  required="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="status_id">Trạng thái</label>

                    <div class="col-md-10">
                        <select name="status_id" class="form-control" id="status_id">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div><!--col-->
                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">Nội dung</label>

                    <div class="col-md-10">
                        <textarea class="form-control" name="description" id="description" placeholder="Nhập nội dung" rows="5">{{ old('description') }}</textarea>
                    </div><!--col-->
                </div>

                {{--<div class="form-group row">
                    <label class="col-md-2 form-control-label" for="content-text">Mô tả</label>

                    <div class="col-md-10">
                        <textarea class="form-control" name="content" id="content-text" placeholder="Nhập mô tả công việc" rows="10">{!! old('content') !!}</textarea>
                    </div><!--col-->
                </div>--}}

                {{--<div class="form-group row">
                    <label class="col-md-2 form-control-label" for="status">@lang('labels.pages.backend.product.form.status')</label>

                    <div class="col-md-10">
                        <input type="checkbox" data-on="Show" value="1" data-off="Hidden" name="status" id="status" checked data-toggle="toggle" data-onstyle="primary">
                    </div><!--col-->
                </div>--}}
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('backend.project_task.index', ['id' => $project->id]) }}" class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
                    </div>

                    <div class="col text-right">
                        <button type="submit" class="btn btn-success btn-sm">@lang('labels.pages.backend.product.form.create_submit')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
@endsection
