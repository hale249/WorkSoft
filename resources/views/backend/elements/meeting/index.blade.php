@extends('backend.layouts.app')

@section('title', __('Quản lý cuộc họp'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        @lang('Quản lý cuộc họp')
                    </h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('backend.meetings.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> @lang('Tạo cuộc họp')</a>
                </div>
            </div>
            <form action="{{ route('backend.meetings.index') }}" method="GET" class="form-inline mt-2">
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
                            <td><strong>Tên cuộc họp</strong></td>
                            <td><strong>Ngày họp</strong></td>
                            <td><strong>Thời gian họp</strong></td>
                            <td><strong>Người tạo</strong></td>
                            <td><strong>Hành động</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($meetings as $meeting)
                            <tr>
                                <td>{{ $meeting->name }}</td>
                                <td>{{ $meeting->date_meeting }}</td>
                                <td>{!! $meeting->time_start_end !!}</td>
                                <td>{{ $meeting->auth ? $meeting->auth->full_name : '' }}</td>
                                <td>{!! $meeting->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    {{ $meetings->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
