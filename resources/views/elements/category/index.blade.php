@extends('layouts.app')

@section('title', 'Quản lý danh mục')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        Quản lý danh mục
                    </h4>
                </div>
                <div class="col-4 text-right">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createCategoryModal">
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
                            <td><strong>Tên</strong></td>
                            <td><strong>Nội dung</strong></td>
                            <td><strong>Trạng thái</strong></td>
                            <td><strong>Tạo lúc</strong></td>
                            <td><strong>Hành động</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{!! $category->status_label !!}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>{!! $category->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('elements.category.modals.create')
    @include('elements.category.modals.edit')
    <script type="text/javascript" src="{{ asset('js/pages/category.js') }}"></script>
@endsection
