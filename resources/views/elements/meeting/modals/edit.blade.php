<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="createMeetingModal"
     data-backdrop="static"
     id="createMeetingModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tạo lập lịch</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-meeting-form" method="post" action="{{ route('meeting.store') }}">
                    <div class="alert alert-danger text-center mb-3 show-errors" style="display: none"></div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="name">Tên cuộc họp</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" placeholder="Nhập tên ..."
                                       required="" autofocus="">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="date_meeting">Ngày họp</label>

                            <div class="col-md-10">
                                <input class="form-control" type="date" name="date_meeting" id="date_meeting"
                                       placeholder="Nhập ngày họp ..." required="">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="time_start">Thời gian bắt đầu / kết
                                thúc</label>

                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="time" class="form-control" name="time_start"
                                               placeholder="Quantity used...">
                                    </div>
                                    <div class="col-6">
                                        <input type="time" class="form-control" name="time_end"
                                               placeholder="Number pallet...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="user">
                                Thành viên tham gia
                            </label>

                            <div class="col-md-10">
                                <select class="parent_filter_select2 pull-right form-control" id="parent_filter_select2"
                                        multiple="multiple" name="user[]" style="width: 100%">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="description">Nội dung cuộc họp</label>

                            <div class="col-md-10">
                                <textarea class="form-control" name="description" id="description"
                                          value="{{ old('description') }}" placeholder="Nhập nội dung cuộc họp"
                                          rows="8">{{ old('description') }}</textarea>
                            </div><!--col-->
                        </div>
                        <button type="submit" name="submit" style="display: none">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" id="btn-create-meeting-save">Save</button>
            </div>
        </div>
    </div>
</div>
