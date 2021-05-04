@extends('layouts.auth')
@section('title')
    Lý do tham từ chối tham gia cuộc họp
@endsection

@section('content')
    <div class="row w-100 mx-0 auth-page">
        <div class="m-auto pb-3">
            <div class="mb-4">
                <h5 class="text-center subtitle mt-4">Lý do từ chối tham gia cuộc họp</h5>
            </div>
            <form class="forms-sample" method="post" action="{{ route('meeting.send-reject', ['meetingId' => request()->meetingId, 'userId' => request()->userId]) }}" id="forgot-password-form">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger text-center mb-3 show-errors">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email" class="font-size-small required">
                        Nhập lý do
                    </label>
                    <textarea rows="4" name="note" type="text" class="form-control" placeholder="Nhập lý do từ chối ..."></textarea>
                </div>

                <div class="row">
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                       Gửi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
