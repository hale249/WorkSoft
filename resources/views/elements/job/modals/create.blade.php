<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="createJobModal"
     data-backdrop="static"
     id="createJobModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tạo công việc</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('jobs.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="name">Tên công việc</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}"
                                       placeholder="Nhập tên công việc" required="" autofocus="">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="deadline">Ngày hết hạn</label>

                            <div class="col-md-10">
                                <input class="form-control" type="date" name="deadline"
                                       value="{{ date('Y-m-d') ?? old('deadline') }}" id="deadline"
                                       placeholder="Nhập ngày họp ..." required="">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="category_id">Danh mục</label>

                            <div class="col-md-10">
                                <select name="category_id" class="form-control" id="category_id" required>
                                    <option value="">Danh mục</option>
                                    @foreach($categories as $category)
                                        <option
                                            {{ old('category_id') === $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        <option
                                            {{ old('user_id') === $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="description">Nội dung</label>

                            <div class="col-md-10">
                        <textarea class="form-control" name="description" placeholder="Nhập nội dung ..."
                                  rows="5">{{ old('description') }}</textarea>
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="description">File dính kèm</label>

                            <div class="col-md-10">
                                <input type="file" name="document_file">
                            </div><!--col-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button class="btn btn-primary" type="submit" id="btn-create-job-save">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
