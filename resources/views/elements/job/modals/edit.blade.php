<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('backend.jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h4 class="card-title mb-0">
                        Công việc
                        <small class="text-muted">Chỉnh sửa công việc</small>
                    </h4>
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="name">Tên công việc</label>

                        <div class="col-md-10">
                            <input class="form-control" type="text" name="name" id="name" value="{{ $job->name ?? old('name') }}" placeholder="Nhập tên công việc" required="" disabled>
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="deadline">Ngày hết hạn</label>

                        <div class="col-md-10">
                            <input class="form-control" type="date" name="deadline" value="{{ date('Y-m-d') ?? old('deadline') }}" id="deadline" placeholder="Nhập ngày họp ...">
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
                            <select name="job_ranting" class="form-control" id="job_ranting" required>
                                <option value="">Loại đầu việc</option>
                                <option value="1" {{ $job->job_ranting === 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $job->job_ranting === 2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $job->job_ranting === 3 ? 'selected' : '' }}>3</option>
                            </select>
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="category_id">Danh mục</label>

                        <div class="col-md-10">
                            <select name="category_id" class="form-control" id="category_id" required>
                                <option value="">Danh mục</option>
                                @foreach($categories as $category)
                                    <option {{ $job->category_id  === $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="user_id">Người phụ trách công việc</label>

                        <div class="col-md-10">
                            <select name="user_id" class="form-control" id="user_id">
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
                            <input class="form-control" type="text" name="point_of_work" id="point_of_work" value="{{ $job->point_of_work }}" placeholder="Nhập điểm người phụ trách cv">
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="person_support">Người hỗ trợ</label>

                        <div class="col-md-10">
                            <select name="person_support" class="form-control" id="person_support">
                                <option value="">Người hỗ trợ</option>
                                @foreach($users as $user)
                                    <option {{ $job->person_support === $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->full_name }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="point_of_work_sp">Điểm người hỗ trợ</label>

                        <div class="col-md-10">
                            <input class="form-control" type="text" name="point_of_work_sp" id="point_of_work_sp" value="{{ $job->point_of_work_sp }}" placeholder="Nhập điểm người hỗ trợ">
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="person_mission">Người quản lý công việc</label>

                        <div class="col-md-10">
                            <select name="person_mission" class="form-control" id="person_mission">
                                <option value="">Người quản lý công việc</option>
                                @foreach($users as $user)
                                    <option {{ $job->person_mission === $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->full_name }}</option>
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

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="content-text">Mô tả</label>

                        <div class="col-md-10">
                            <textarea class="form-control" name="content" id="content-text" placeholder="Nhập mô tả công việc" rows="10">{!! $job->content ?? old('content') !!}</textarea>
                        </div><!--col-->
                    </div>


                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('backend.jobs.index') }}" class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
                        </div>

                        <div class="col text-right">
                            <button type="submit" class="btn btn-success btn-sm">@lang('labels.general.update')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
