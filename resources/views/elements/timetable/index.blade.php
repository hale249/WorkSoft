@extends('layouts.app')

@section('title', __('Quản lý cuộc họp'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        @lang('Quản lý môn học')
                    </h4>
                </div>
            </div>
            <form action="{{ route('timetable.index') }}" method="GET" class="form-inline mt-2">
                <div class="form-group">
                    <input type="text" name="name" value="{{ request()->get('name') }}" class="form-control" placeholder="Tìm kiếm môn học">
                </div>
                <button type="submit" class="btn btn-primary btn-same-select ml-2">Tìm kiếm</button>
            </form>
            <div class="mt-4">
                <p>Tổng số tiết: {{ $credit }}</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <td><strong>Mã MH</strong></td>
                            <td><strong>Tên MH</strong></td>
                            <td><strong>NMH</strong></td>
                            <td><strong>STC</strong></td>
                            <td><strong>Mã lớp</strong></td>
                            <td><strong>STCHP</strong></td>
                            <td><strong>Kỳ</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($timeTables as $item)
                            <tr>
                                <td>{{ $item->sub_code }}</td>
                                <td>{{ $item->subject_name }}</td>
                                <td>{{ $item->group }}</td>
                                <td>{{ $item->credit }}</td>
                                <td>{{ $item->class_code }}</td>
                                <td>{{ $item->credit_tuit }}</td>
                                <td>{{ $item->semester }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

