@extends('backend.layouts.app')

@section('title', __('Chỉnh sửa công việc'))

@section('content')
    <div class="card">
        <form action="{{ route('backend.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-0">
                    Công việc
                    <small class="text-muted">Chỉnh sửa công việc</small>
                </h4>
                <hr>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="category_id">Danh mục</label>

                    <div class="col-md-10">
                        <select name="category_id" class="form-control" id="category_id" required>
                            <option value="">Danh mục</option>
                            @foreach($categories as $category)
                                <option @if(!empty(old('category_id')) && old('category_id') === $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Tên công việc</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $project->name ?? old('name') }}" placeholder="Nhập tên công việc" required="" autofocus="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="user_id">Người thực hiện</label>

                    <div class="col-md-10">
                        <select name="user_id" class="form-control" id="user_id">
                            <option value="">Người thực hiện</option>
                            @foreach($users as $user)
                                <option @if(!empty(old('user_id')) && old('user_id') === $user->id) selected @endif value="{{ $user->id }}">{{ $user->full_name }}</option>
                            @endforeach
                        </select>
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="deadline">Ngày hết hạn</label>

                    <div class="col-md-10">
                        <input class="form-control" type="date" name="deadline" value="{{ $project->deadline ?? old('deadline') }}" id="deadline" placeholder="Nhập ngày họp ..."  required="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">Nội dung</label>

                    <div class="col-md-10">
                        <textarea class="form-control" name="description" id="description" placeholder="Nhập nội dung" rows="5">{{ $project->description ?? old('description') }}</textarea>
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="content-text">Mô tả</label>

                    <div class="col-md-10">
                        <textarea class="form-control" name="content" id="content-text" placeholder="Nhập mô tả công việc" rows="10">{!! $project->content ?? old('content') !!}</textarea>
                    </div><!--col-->
                </div>

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
                        <a href="{{ route('backend.projects.index') }}" class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
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
