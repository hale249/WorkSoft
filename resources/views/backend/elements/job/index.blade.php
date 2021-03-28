@extends('backend.layouts.app')

@section('title', __('Quản lý công việc'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        @lang('Quản lý công việc')
                    </h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('backend.jobs.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> @lang('Tạo công việc')</a>
                </div>
            </div>

            <form action="{{ route('backend.jobs.index') }}" method="GET" class="form-inline mt-2">
                <div class="form-group">
                    <input type="text" name="name" value="{{ request()->get('name') }}" class="form-control" placeholder="Tìm kiếm lập lịch">
                </div>
                <button type="submit" class="btn btn-primary btn-same-select ml-2">Tìm kiếm</button>
            </form>

            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <td><strong>Danh mục</strong></td>
                            <td><strong>Tên công việc</strong></td>
                            <td><strong>Người làm</strong></td>
                            <td><strong>Trạng thái</strong></td>
                            <td><strong>Hành động</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>
                                    @if(!empty($job->category))
                                        <a href="{{ route('backend.category.show', $job->category_id) }}" target="_blank">{{ $job->category->name }}</a>
                                    @endif
                                </td>
                                <td>{{ $job->name }}</td>
                                <td>{{ $job->user->full_name }}</td>
                                <td></td>
                                <td>{!! $job->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
