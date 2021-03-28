@extends('backend.layouts.app')

@section('title', __('Quản lý vai trò'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        @lang('Quản lý vai trò')
                    </h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('backend.permissions.create') }}" class="btn btn-primary btn-sm"><i
                            class="fas fa-plus"></i> @lang('Tạo vai trò')</a>
                </div>
            </div>
            <form action="{{ route('backend.permissions.index') }}" method="GET" class="form-inline mt-2">
                <div class="form-group">
                    <input type="text" name="name" value="{{ request()->get('name') }}" class="form-control"
                           placeholder="Tìm kiếm...">
                </div>
                <button type="submit" class="btn btn-primary btn-same-select ml-2">Tìm kiếm</button>
            </form>
            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <td><strong>Tên</strong></td>
                            <td><strong>Nội dung</strong></td>
                            <td><strong>Thời gian tạo</strong></td>
                            <td><strong>Hành động</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td>{{ $permission->created_at }}</td>
                                <td>{!! $permission->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
