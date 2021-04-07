@extends('layouts.app')

@section('title', __('Danh sách trạng thái'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        @lang('Danh sách trạng thái')
                    </h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('backend.status.create') }}" class="btn btn-primary btn-sm"><i
                            class="fas fa-plus"></i> @lang('Tạo mới')</a>
                </div>
            </div>

            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <td><strong>@lang('Tên')</strong></td>
                            <td><strong>@lang('Mô tả')</strong></td>
                            <td><strong>@lang('Tạo lúc')</strong></td>
                            <td><strong>@lang('Hành động')</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($statuses as $status)
                            <tr>
                                <td>
                                    <span class="badge badge-pill"
                                          style="background-color: {{ $status->color }}; color: #000000">{{ $status->name }}</span>
                                </td>
                                <td>{{ $status->description }}</td>
                                <td>{{ $status->created_at }}</td>
                                <td>{!! $status->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    {{ $statuses->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/backend/jscolor.js') }}"></script>
    <script type="text/javascript">
        jscolor.presets.default = {
            width: 141,               // make the picker a little narrower
            position: 'right',        // position it to the right of the target
            previewPosition: 'right', // display color preview on the right
            previewSize: 40,          // make the color preview bigger
            palette: [
                '#000000', '#7d7d7d', '#870014', '#ec1c23', '#ff7e26',
                '#fef100', '#22b14b', '#00a1e7', '#3f47cc', '#a349a4',
                '#ffffff', '#c3c3c3', '#b87957', '#feaec9', '#ffc80d',
                '#eee3af', '#b5e61d', '#99d9ea', '#7092be', '#c8bfe7',
            ],
        };
    </script>
@endsection
