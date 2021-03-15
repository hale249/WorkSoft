<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('auth.logout') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('strings.logout_modal_title')</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">@lang('strings.logout_modal_text')</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">@lang('labels.general.cancel')</button>
                    <button type="submit" class="btn btn-primary">@lang('labels.general.logout')</button>
                </div>
            </div>
        </form>
    </div>
</div>
