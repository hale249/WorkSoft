@extends('backend.layouts.app')

@section('title', __('Danh sách người dùng'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        @lang('Danh sách người dùng')
                    </h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('backend.users.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> @lang('Tạo mới')</a>
                </div>
            </div>

            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td><strong>Tên</strong></td>
                                <td><strong>@lang('labels.pages.backend.users.table.email')</strong></td>
                                <td><strong>Số điện thoại</strong></td>
                                <td><strong>Sinh ngày</strong></td>
                                <td><strong>Hành động</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{!! $user->full_name !!}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->birthday }}</td>
                                <td>{!! $user->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
