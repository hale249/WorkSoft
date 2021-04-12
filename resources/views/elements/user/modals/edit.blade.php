<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="editUserModal" data-backdrop="static"
     id="editUserModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chỉnh sửa người dùng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-user-form" method="post">
                    <div class="alert alert-danger text-center mb-3 show-errors" style="display: none"></div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="staff_code">Mã cán bộ</label>

                            <div class="col-md-10">
                                <input class="form-control staff_code" type="text" name="staff_code" value="{{ old('staff_code') }}" placeholder="Nhap mã cán bộ ..." maxlength="191" required="" autofocus>
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="name">Tên</label>

                            <div class="col-md-10">
                                <input class="form-control name" type="text" name="name" value="{{ old('name') }}" placeholder="Nhap ten ..." maxlength="191" required="">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="email">Email</label>

                            <div class="col-md-10">
                                <input class="form-control email" type="email" name="email" value="{{ old('email') }}" placeholder="Nhap email..." maxlength="191" disabled>
                            </div><!--col-->
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="role">Vai trò</label>

                            <div class="col-md-10">
                                <input class="ml-2 role" type="checkbox" name="role" style="transform: scale(2.0);">
                                <label class="ml-3">Admin</label>
                            </div><!--col-->
                        </div>

                        <button type="submit" name="submit" style="display: none">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" id="btn-update-user-save">Save</button>
            </div>
        </div>
    </div>
</div>
