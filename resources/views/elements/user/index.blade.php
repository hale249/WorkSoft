@extends('layouts.app')

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
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createUserModal">
                        <i class="fas fa-plus"></i>
                        Tạo mới
                    </button>
                </div>
            </div>

            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <td><strong>Mã cán bộ</strong></td>
                            <td><strong>Tên</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong>Vai trò</strong></td>
                            <td><strong>Hành động</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->staff_code }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{!! $user->role_name !!}</td>
                                <td>{!! $user->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @include('share.pagination.simple-bootstrap-4', [ 'paginator' => $users ])
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('elements.user.modals.create')
    @include('elements.user.modals.edit')
    @include('elements.user.modals.change_password')

    <script type="text/javascript" src="{{ asset('js/pages/user.js') }}"></script>
@endsection
