@extends('layouts.app')

@section('title', __('Thành viên tham gia cuộc họp'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title mb-0">
                        @lang('Thành viên xác nhận tham gia cuộc họp') : {{ $countUserJoin }}
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
                            <td><strong>Xác nhận tham gia</strong></td>
                            <td><strong>Điểm danh</strong></td>
                            <td><strong>Ghi chú</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($meetings->meetingUsers) > 0)
                        @foreach($meetings->meetingUsers as $key=>$item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->user ? $item->user->name : '' }}</td>
                                <td>{!! $item->is_embarked !!}</td>
                                <td>
                                    <input type="checkbox" name="is_attend"
                                           style="transform: scale(1.5);"
                                           {{ $item->is_attend ? 'checked' : '' }}
                                           class="attend" data-url="{{ route('meeting.attend', ['id' => $id, 'userId' => $item->user->id]) }}">
                                </td>
                                <td>{{ $item->note }}</td>
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

@section('script')
    <script type="text/javascript">
        $('.attend').change(function (e){
            e.preventDefault()
            var attended = $(this).val();
            var url = $(this).data('url');
            $.ajax({
                url: url,
                type: "post",
                data: {
                    is_attend: attended
                } ,
                success: function (response) {
                    console.log('cap nhat thanh cong');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    </script>
@endsection
