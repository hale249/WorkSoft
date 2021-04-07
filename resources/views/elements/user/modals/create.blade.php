<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('backend.users.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <h4 class="card-title mb-0">
                        @lang('Người dùng')
                        <small class="text-muted">@lang('Tạo mới')</small>
                    </h4>
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="first_name">@lang('First name')</label>

                        <div class="col-md-10">
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="{{ __('First name') }}" maxlength="191" required="" autofocus="">
                        </div><!--col-->
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="last_name">@lang('Last name')</label>

                        <div class="col-md-10">
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="{{ __('Last name') }}" maxlength="191" required="">
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="email">@lang('labels.pages.backend.users.form.email')</label>

                        <div class="col-md-10">
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('labels.pages.backend.users.form.placeholder.email') }}" maxlength="191" required="" autofocus="">
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="password">@lang('labels.pages.backend.users.form.password')</label>

                        <div class="col-md-10">
                            <input class="form-control" type="password" name="password" id="password" placeholder="{{ __('labels.pages.backend.users.form.placeholder.password') }}" maxlength="191" required="" autofocus="">
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="password-confirmation">@lang('labels.pages.backend.users.form.password_confirmation')</label>

                        <div class="col-md-10">
                            <input class="form-control" type="password" name="password_confirmation" id="password-confirmation" placeholder="{{ __('labels.pages.backend.users.form.placeholder.password_confirmation') }}" maxlength="191" required="" autofocus="">
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="role">Gán vai trò</label>

                        <div class="col-md-10">
                            <select name="role" class="form-control" id="role">
                                <option value="">Gán vai trò</option>
                                @foreach($roles as $role)
                                    <option {{ old('$role') === $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ trans('role.' . $role->name) }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('backend.users.index') }}" class="btn btn-danger btn-sm">@lang('labels.general.cancel')</a>
                        </div>

                        <div class="col text-right">
                            <button type="submit" class="btn btn-success btn-sm">@lang('labels.pages.backend.users.form.create_submit')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
