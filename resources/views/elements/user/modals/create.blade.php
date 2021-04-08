<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="createUserModal" data-backdrop="static"
     id="createUserModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm người dùng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-user-form" method="post" action="{{ route('users.store') }}">
                    <div class="alert alert-danger text-center mb-3 show-errors" style="display: none"></div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="staff_code">Mã cán bộ</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="staff_code" value="{{ old('staff_code') }}" placeholder="Nhap mã cán bộ ..." maxlength="191" required="" autofocus>
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="name">Tên</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Nhap ten ..." maxlength="191" required="">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="email">Email</label>

                            <div class="col-md-10">
                                <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Nhap email..." maxlength="191" required="">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password">Mật khẩu</label>

                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password" id="password" placeholder="Nhập mật khẩu ..." maxlength="191" required="">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password_confirmation">Nhập lại mật khẩu</label>

                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Nhập lại mật khẩu ..." maxlength="191" required="">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="role">Vai trò</label>

                            <div class="col-md-10">
                                <input class="ml-2" type="checkbox" name="role" style="transform: scale(2.0);">
                                <label class="ml-3">Admin</label>
                            </div><!--col-->
                        </div>

                        <button type="submit" name="submit" style="display: none">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" id="btn-create-user-save">Save</button>
            </div>
        </div>
    </div>
</div>
