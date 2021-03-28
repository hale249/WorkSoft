@extends('backend.layouts.app')

@section('title', __('Quản lý vai trò'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        @lang('Quản lý quyền')
                    </h4>
                </div>
            </div>
            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <td><strong>Tên</strong></td>
                            <td><strong>Mô tả</strong></td>
                            <td><strong>Thời gian tạo</strong></td>
                            <td><strong>Hành động</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ trans('role.' . $role->name) }}</td>
                                <td>{{ $role->description }}</td>
                                <td>{{ $role->created_at }}</td>
                                <td>{!! $role->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
