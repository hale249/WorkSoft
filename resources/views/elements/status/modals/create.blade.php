<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('backend.status.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h4 class="card-title mb-0">
                        @lang('Trạng thái')
                        <small class="text-muted">@lang('Tạo mới')</small>
                    </h4>
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="name">@lang('Tên trạng thái')</label>

                        <div class="col-md-10">
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name')  }}"
                                   placeholder="{{ __('Nhập tên trạng thái') }}" maxlength="191" required="" autofocus>
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="color">@lang('Màu trạng thái')</label>

                        <div class="col-md-10">
                            <input class="form-control" type="text" name="color" placeholder="#188bf0"
                                   data-jscolor="{value: '#188bf0'}"/>
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="description">@lang('Mô tả trạng thái')</label>

                        <div class="col-md-10">
                        <textarea class="form-control" name="description" id="description"
                                  placeholder="{{ __('Nhập mô tả ...') }}" rows="5"></textarea>
                        </div><!--col-->
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('backend.status.index') }}"
                               class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
                        </div>

                        <div class="col text-right">
                            <button type="submit"
                                    class="btn btn-success btn-sm">@lang('labels.pages.backend.category.form.edit_submit')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
