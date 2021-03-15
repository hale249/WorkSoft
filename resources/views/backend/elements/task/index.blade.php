@extends('backend.layouts.app')

@section('title', __('Quản lý nhiệm vụ'))

@section('content')
    <div class="card">
        <div class="card-body">
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

            <form action="{{ route('backend.tasks.index', ['id', $project->id]) }}" method="GET" class="form-inline mt-2">
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
                                <td>{{ $task->created_by }}</td>
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
