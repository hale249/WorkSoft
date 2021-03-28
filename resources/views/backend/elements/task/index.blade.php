@extends('backend.layouts.app')

@section('title', __('Quản lý nhiệm vụ'))

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-0">
                Công việc
                <small class="text-muted">Chi tiết công việc - {{ $project->name }}</small>
            </h4>
            <hr>

            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="name">Tên công việc</label>

                        <div class="col-md-10">
                            {{ $project->name }}
                        </div><!--col-->
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="name">Người làm</label>

                        <div class="col-md-10">
                            {{ $project->user->full_name }}
                        </div><!--col-->
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="name">Làm đến</label>

                        <div class="col-md-10">
                            {{ $project->deadline }}
                        </div><!--col-->
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="description">Nội dung</label>

                        <div class="col-md-10">
                            @if($project->description)
                                {{ $project->description }}
                            @else
                                @lang('labels.general.empty')
                            @endif
                        </div><!--col-->
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="description">Content</label>

                        <div class="col-md-10">
                            @if($project->content)
                                {!! $project->content !!}
                            @else
                                @lang('labels.general.empty')
                            @endif
                        </div><!--col-->
                    </div>
                </div>
                <div class="col-6">
                    @include('backend.elements.project.include.file_upload')
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        @lang('Quản lý nhiêm vụ')
                    </h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('backend.project_task.create', ['id' => $project->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> @lang('Tạo nhiệm vụ')</a>
                </div>
            </div>

            <form action="{{ route('backend.project_task.index', ['id', $project->id]) }}" method="GET" class="form-inline mt-2">
                <div class="form-group">
                    <input type="text" name="name" value="" class="form-control" placeholder="Tìm kiếm lập lịch">
                </div>
                <button type="submit" class="btn btn-primary btn-same-select ml-2">Tìm kiếm</button>
            </form>

            <div class="mt-4">
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
                                <td>{!! $task->getActionButtonsAttribute($project->id) !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    {{ $tasks->links() }}
                </div>
            </div>
           {{-- <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="http://127.0.0.1:8000/admin/meetings" class="btn btn-danger btn-sm">Cancel</a>
                    </div>

                    <div class="col text-right">
                        <button type="submit" class="btn btn-success btn-sm">Create</button>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
@endsection

@section('css')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@endsection
