@extends('layouts.app')

@section('title', __('Thành viên tham gia cuộc họp'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        @lang('Thành viên tham gia cuộc họp') : {{ count($meetings) }}
                    </h4>
                </div>
            </div>
            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <td><strong></strong></td>
                            <td><strong>Tên thành viên</strong></td>
                            <td><strong>Chập nhận lúc</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($users) > 0)
                        @foreach($users as $key=>$user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
{{--                                <td>{{ $user->user ? $user->user->name : '' }}</td>--}}
                                <td>{{ $user->reply_at }}</td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3" class="text-center">Chưa có thành viên tham gia</td>
                        </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
