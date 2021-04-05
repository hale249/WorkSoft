@extends('backend.layouts.app')

@section('title', __('Tạo lập lịch'))

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card">
        <form action="{{ route('backend.meeting.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-0">
                    @lang('Quản lý lập lịch')
                    <small class="text-muted">@lang('Tạo lập lịch')</small>
                </h4>
                <hr>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="name">Tên cuộc họp</label>

                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('labels.pages.backend.category.form.placeholder.name') }}" required="" autofocus="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="date_meeting">Ngày họp</label>

                    <div class="col-md-10">
                        <input class="form-control" type="date" name="date_meeting" value="{{ date('Y-m-d') ?? old('date_meeting') }}" id="date_meeting" placeholder="Nhập ngày họp ..."  required="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="start_meeting">Thời gian bắt đầu</label>

                    <div class="col-md-10">
                        <input class="form-control" type="time" name="start_meeting" value="{{ time() ?? old('start_meeting') }}" id="start_meeting" placeholder="Thời gian bắt đầu ..." required="">
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="end_meeting">Thời gian kết thúc</label>

                    <div class="col-md-10">
                        <input class="form-control" type="time" name="end_meeting" value="{{ time() ?? old('end_meeting') }}" id="end_meeting" placeholder="Thời gian kết thúc ..." required="">
                    </div><!--col-->
                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">
                        Thành viên tham gia
                        <input type="checkbox" name="" id="checkbox" style="transform: translate(1.3)"> Check all
                    </label>

                    <div class="col-md-10">
                        <select class="parent_filter_select2 pull-right form-control" id="parent_filter_select2" multiple="multiple" name="user_id[]" style="width: 100%">
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{!! $user->full_name !!}</option>
                            @endforeach
                        </select>

                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="description">Nội dung cuộc họp</label>

                    <div class="col-md-10">
                        <textarea class="form-control" name="description" id="description" value="{{ old('description') }}" placeholder="Nhập nội dung cuộc họp" rows="8">{{ old('description') }}</textarea>
                    </div><!--col-->
                </div>

                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="document_file">File dính kèm <small>(nếu có)</small></label>

                    <div class="col-md-10">
                        <input type="file" name="document_file" id="document_file">
                    </div><!--col-->
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('backend.meeting.index') }}" class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
                    </div>

                    <div class="col text-right">
                        <button type="submit" class="btn btn-success btn-sm">@lang('labels.pages.backend.category.form.create_submit')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <<script type="text/javascript">
       $('#parent_filter_select2').select2({
           placeholder: 'Thành viên nhân thông báo'
       });
       $("#checkbox").click(function(){
           if($("#checkbox").is(':checked') ){
               $("select > option").prop("selected","selected");
           }else{
               $("select > option").removeAttr("selected");
           }
       });
   </script>
@endsection
