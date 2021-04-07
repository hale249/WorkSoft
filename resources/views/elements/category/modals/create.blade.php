<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="createCategoryModal" data-backdrop="static"
     id="createCategoryModal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm danh mục</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-category-form" method="post" action="{{ route('category.store') }}">
                    <div class="alert alert-danger text-center mb-3 show-errors" style="display: none"></div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="name">Tên</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}"
                                       placeholder="Nhập tên danh mục ..." autofocus>
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="name">Tên
                                <small class="text-capitalize text-disabled"><i>(Không bắt buộc)</i></small>
                            </label>
                            <div class="col-md-10">
                            <textarea class="form-control" name="description" id="description"
                                      placeholder="Nhập mô tả danh mục ..." rows="5">{{ old('description') }}</textarea>
                            </div><!--col-->
                        </div>
                        <button type="submit" name="submit" style="display: none">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" id="btn-create-category-save">Save</button>
            </div>
        </div>
    </div>
</div>
