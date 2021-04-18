@extends('layouts.app')

@section('title', __('Công việc') . ' - ' . $job->name)

@section('content')
    <div class="d-flex flex-column flex-sm-row mb-2">
        <h4 class="flex-grow-1 mb-0 text-danger"><span>Hạn hoàn thành công việc: {{ $job->deadline }}</span>
            <button class="btn btn-primary" type="button" data-toggle="modal"
                    data-target="#finishMessageSendMail">Gửi email xác nhận phê duyệt
            </button>
        </h4>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-muted">CHI TIẾT CÔNG VIỆC</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="name">Trạng thái</label>

                        <div class="col-md-8">
                            <span style="background-color: {{ !empty($job->status) ? $job->status->color : '' }}"
                                  type="button">{{ !empty($job->status) ? $job->status->name : '' }}</span>
                        </div><!--col-->
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="name">Người thực hiện công việc</label>

                        <div class="col-md-8">
                            {{ !empty($job->user) ? $job->user->name : '' }}
                        </div><!--col-->
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="name">Làm đến</label>

                        <div class="col-md-8">
                            {{ $job->deadline }}
                        </div><!--col-->
                    </div>


                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="description">Nội dung</label>

                        <div class="col-md-8">
                            @if($job->description)
                                {{ $job->description }}
                            @else
                                @lang('labels.general.empty')
                            @endif
                        </div><!--col-->
                    </div>
                    @if(\App\Helpers\Helper::checkRole(\Illuminate\Support\Facades\Auth::user()))
                        <div class="mt-3">
                            <button class="btn btn-primary" type="button" data-toggle="modal"
                                    data-target="#editJobDetailModal">Edit
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12 col-lg-6">
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h5 class="text-muted">Xác nhận minh chứng hoàn thành</h5>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{ route('jobs.finish', $job->id) }}" id="finish-job-form">--}}
{{--                        <div class="alert alert-danger text-center mb-3 show-errors" style="display: none"></div>--}}
{{--                        <div class="row mt-2">--}}
{{--                            <div class="col-2 task-label">Tiến độ:</div>--}}
{{--                            <div class="col-8 font-weight-bold text-muted task-value">--}}
{{--                                <input type="checkbox" class="is_finish" name="is_finish" @if($job->is_finish) checked--}}
{{--                                       @endif style="transform: scale(2.0);">&ensp; Hoàn thành--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row mt-4">--}}
{{--                            <div class="col-2 task-label">Nội dung yêu cầu xác nhận:</div>--}}
{{--                            <div class="col-10">--}}
{{--                                <textarea class="form-control finish_mess" name="finish_mess"--}}
{{--                                          rows="3">{{ $job->finish_mess }}</textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <button type="submit" name="submit" style="display: none">Submit</button>--}}
{{--                        <div class="text-right mt-4">--}}
{{--                            <button class="btn btn-primary" type="button" id="btn-finish-job-save">Save</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="card mt-3">
                @include('elements.job.includes.update')
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('elements.job.includes.messages')
    <script type="text/javascript" src="{{ asset('js/pages/show-job.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script type="text/javascript">
        $("#").dropzone({
            url: $('#').attr('action'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function () {
                this.on("queuecomplete", function (file) {
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                });
            }
        });
    </script>
@endsection
