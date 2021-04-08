<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="changePasswordUserModal" data-backdrop="static"
     id="changePasswordUserModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thay đổi mât khẩu người dùng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="change-password-user-form" method="post">
                    <div class="alert alert-danger text-center mb-3 show-errors" style="display: none"></div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password">Mật khẩu</label>

                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu ..." maxlength="191" required="">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password_confirmation">Nhập lại mật khẩu</label>

                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu ..." maxlength="191" required="">
                            </div><!--col-->
                        </div>
                        <button type="submit" name="submit" style="display: none">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" id="btn-change-password-user-save">Save</button>
            </div>
        </div>
    </div>
</div>
