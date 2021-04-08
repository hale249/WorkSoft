<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="editStatusModal" data-backdrop="static"
     id="editStatusModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chỉnh sửa trạng thái</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="update-status-form" method="post">
                    <div class="alert alert-danger text-center mb-3 show-errors" style="display: none"></div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="name">@lang('Tên trạng thái')</label>

                            <div class="col-md-10">
                                <input class="form-control name" type="text" name="name" value="{{ old('name')  }}"
                                       placeholder="{{ __('Nhập tên trạng thái') }}" maxlength="191" disabled>
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="color">@lang('Màu trạng thái')</label>

                            <div class="col-md-10">
                                <input class="form-control color" type="text" name="color" placeholder="#188bf0" value="#188bf0"
                                       data-jscolor="{value: '#188bf0'}" autofocus/>
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="description">@lang('Mô tả trạng thái')</label>

                            <div class="col-md-10">
                        <textarea class="form-control description" name="description"
                                  placeholder="{{ __('Nhập mô tả ...') }}" rows="5"></textarea>
                            </div><!--col-->
                        </div>
                        <button type="submit" name="submit" style="display: none">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" id="btn-update-status-save">Save</button>
            </div>
        </div>
    </div>
</div>
