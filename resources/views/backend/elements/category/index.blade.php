@extends('backend.layouts.app')

@section('title', __('labels.pages.backend.category.title.management'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        @lang('labels.pages.backend.category.title.management')
                    </h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('backend.category.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> @lang('labels.pages.backend.category.create_new_category')</a>
                </div>
            </div>

            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <td><strong>@lang('labels.pages.backend.category.table.name')</strong></td>
                            <td><strong>@lang('labels.pages.backend.category.table.image')</strong></td>
                            <td><strong>@lang('labels.pages.backend.category.table.user')</strong></td>
                            <td><strong>@lang('labels.general.status')</strong></td>
                            <td><strong>@lang('labels.general.created_at')</strong></td>
                            <td><strong>@lang('labels.general.action')</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <img src="{{ $category->image }}" width="100">
                                </td>
                                <td>{{ $category->user->full_name }}</td>
                                <td>{!! $category->status_label !!}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>{!! $category->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
