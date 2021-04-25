<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="editTaskModal"
     data-backdrop="static"
     id="editTaskModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chỉnh sửa nhiệm vụ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="nameTask">Tên công việc</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="nameTask" id="nameTask" value="{{ old('nameTask') }}"
                                       placeholder="Nhập tên công việc" required="" autofocus="">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="deadlineTask">Ngày hết hạn</label>

                            <div class="col-md-10">
                                <input class="form-control" type="date" name="deadlineTask"
                                       value="{{ date('Y-m-d') ?? old('deadlineTask') }}" id="deadlineTask"
                                       placeholder="Nhập ngày họp ..." required="">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="descriptionTask">Nội dung</label>

                            <div class="col-md-10">
                        <textarea class="form-control" name="descriptionTask" placeholder="Nhập nội dung ..."
                                  rows="5">{{ old('descriptionTask') }}</textarea>
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
