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
    <h3>Công việc của <strong>{{ $name }}</strong> cần phải phê duyệt</h3>
    <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary">Xem chi tiết công việc</a> <hr/>
    <a href="/">Quay về trang chủ</a>
</div>
</body>
</html>
