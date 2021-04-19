<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="finishMessageSendMail"
     data-backdrop="static"
     id="finishMessageSendMail" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Gửi email xác nhận công việc hoàn thành</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('jobs.send-message', $job->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="finish_mess">Nội dung</label>

                        <div class="col-md-10">
                            <textarea class="form-control" name="finish_mess" id="finish_mess"
                                      placeholder="Nhập nội dung gửi email"
                                      rows="5">{{ $job->finish_mess }}</textarea>
                        </div><!--col-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" id="btn-update-finish-save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
