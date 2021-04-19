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

                    <div class="form-group row">
                        <label class="col-md-4 form-control-label" for="name">File dính kèm</label>

                        <div class="col-md-8">
{{--                            {{ $job->deadline }}--}}
                        </div><!--col-->
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 col-md-12 col-lg-6">
            <div class="card mt-3">
                @include('elements.job.includes.update')
            </div>
        </div>
    </div>

  {{--  <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <td><strong>Tên nhiệm vụ</strong></td>
                        <td><strong>Thời hạn</strong></td>
                        <td><strong>Trạng thái</strong></td>
                        <td><strong>Hành động</strong></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->deadline }}</td>
                            <td><span class="badge badge-pill" style="background-color: {{ $task->status->color }}; color: #000000">{{ $task->status->name }}</span></td>
                            <td>{!! $task->getActionButtonsAttribute($job->id) !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-right">
                {{ $tasks->links() }}
            </div>
        </div>
    </div>--}}
@endsection
@section('script')
    @include('elements.job.includes.messages')
    <script type="text/javascript" src="{{ asset('js/pages/show-job.js') }}"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        $("#job-attachments").dropzone({
            url: $('#job-attachments').attr('action'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                this.on("queuecomplete", function (file) {
                    showSuccessMessage('Attachments have been uploaded successfully.');
                    setTimeout(function() {
                        window.location.reload();
                    }, 500);
                });
            }
        });

        @if(\Session::has('message'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000
        });

        Toast.fire({
            icon: 'success',
            title: '{{ session('message') }}'
        });
        @endif

        @if(\Session::has('error'))
        const Toast2 = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000,
        });

        Toast2.fire({
            icon: 'error',
            title: '{{ session('error') }}'
        });
        @endif
    </script>
@endsection

