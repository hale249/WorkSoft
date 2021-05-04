<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="text-center">
    <h3>Chào <strong>{{ $name }}</strong>. {{ $text }}</h3>
    @if($code == 200)
    <a href="{{ route('jobs.show', $model->id) }}" class="btn btn-primary">Xem chi tiết công việc</a> <hr/>
    @else
        <a href="{{ route('preview.meeting', $model->uuid) }}" class="btn btn-primary">Xem chi tiết cuộc họp</a> <hr/>
    @endif
    <a href="/">Quay về trang chủ</a>
</div>
</body>
</html>
