<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="editJobDetailModal"data-backdrop="static"
     id="editJobDetailModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chỉnh sửa công việc</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="name">Tên công việc</label>

                        <div class="col-md-10">
                            <input class="form-control" type="text" name="name" id="name" placeholder="Nhập tên công việc" required="" disabled>
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="deadline">Ngày hết hạn</label>

                        <div class="col-md-10">
                            <input class="form-control" type="date" name="deadline" placeholder="Nhập ngày họp ...">
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="status_id">Trạng thái</label>

                        <div class="col-md-10">
                            <select name="status_id" class="form-control" id="status_id">
                                <option value="">Trạng thái</option>
                                @foreach($statuses as $status)
                                    <option  {{ $job->status_id === $status->id ? 'selected' : '' }} value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="job_ranting">Loại đầu việc</label>

                        <div class="col-md-10">
                            <select name="job_ranting" class="form-control" required>
                                <option value="">Loại đầu việc</option>
                                <option value="1" {{ $job->job_ranting === 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $job->job_ranting === 2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $job->job_ranting === 3 ? 'selected' : '' }}>3</option>
                            </select>
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="user_id">Người phụ trách công việc</label>

                        <div class="col-md-10">
                            <select name="user_id" class="form-control">
                                <option value="">Người phụ trách công việc</option>
                                @foreach($users as $user)
                                    <option {{ $job->user_id === $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->full_name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="point_of_work">Điểm người phụ trách công việc</label>

                        <div class="col-md-10">
                            <input class="form-control" type="text" name="point_of_work" value="{{ $job->point_of_work }}" placeholder="Nhập điểm người phụ trách cv">
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="person_support">Người hỗ trợ</label>

                        <div class="col-md-10">
                            <select name="person_support" class="form-control">
                                <option value="">Người hỗ trợ</option>
                                @foreach($users as $user)
                                    <option {{ $job->person_support === $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="point_of_work_sp">Điểm người hỗ trợ</label>

                        <div class="col-md-10">
                            <input class="form-control" type="text" name="point_of_work_sp" value="{{ $job->point_of_work_sp }}" placeholder="Nhập điểm người hỗ trợ">
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="person_mission">Người quản lý công việc</label>

                        <div class="col-md-10">
                            <select name="person_mission" class="form-control" id="person_mission">
                                <option value="">Người quản lý công việc</option>
                                @foreach($users as $user)
                                    <option {{ $job->person_mission === $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="description">Nội dung</label>

                        <div class="col-md-10">
                            <textarea class="form-control" name="description" id="description" placeholder="Nhập nội dung" rows="5">{{ $job->description ?? old('description') }}</textarea>
                        </div><!--col-->
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" id="btn-update-job-save">Save</button>
            </div>
        </div>
    </div>
</div>
