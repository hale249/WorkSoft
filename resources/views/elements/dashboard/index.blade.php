@extends('layouts.app')

@section('title', __('Tổng quan'))

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('dashboard.index') }}" method="GET" class="form-inline my-3">
                <div class="form-group">
                    <select class="form-control" name="year">
                        <option value="{{ \Carbon\Carbon::now()->year }}">-- Tìm kiếm theo năm --</option>
                        @foreach($listYears as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-same-select ml-2">Tìm kiếm</button>
            </form>
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Số lượng thành viên
                                    </div>
                                    <div
                                        class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistical['countUser'] }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Cuộc họp sắp diễn ra
                                    </div>
                                    <div
                                        class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistical['meetingUpcoming'] }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Công việc
                                    </div>
                                    <div
                                        class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistical['countJob'] }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Công việc cần
                                        phê duyệt
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div
                                                class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $statistical['countJobCompleted'] }}</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Tiến độ công việc</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="myAreaChart" style="display: block; width: 1039px; height: 320px;"
                                        width="1039" height="320" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Công việc</th>
                                <th scope="col">Người thực hiện</th>
                                <th scope="col">View</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($jobApprovals) > 0)
                                @foreach($jobApprovals as $key=>$job)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $job->name }}</td>
                                        <td>{{ isset($job->user) ? $job->user->name : '' }}</td>
                                        <td><a href="{{ route('jobs.show', $job->id) }}">xem</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="table-info">
                                    <td colspan="4" class="text-center">
                                        Không có công việc cần phê duyệt
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên cuộc họp</th>
                                <th scope="col">Thời gian hợp</th>
                                <th scope="col">Giờ hợp</th>
                                <th scope="col">View</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($meetingUpcomings) > 0)
                            @foreach($meetingUpcomings as $key=>$meeting)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $meeting->name }}</td>
                                    <td>{{ $meeting->date_meeting }}</td>
                                    <td>{!! $meeting->time_etart_end !!}</td>
                                    <td><a href="">xem</a></td>
                                </tr>
                            @endforeach
                            @else
                                <tr class="table-info">
                                    <td colspan="5" class="text-center">
                                        Không có cuộc họp sắp tới
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        var dataLabels = {!! json_encode($jobProgress['data']) !!};
        var dataSetStart = {!! json_encode($jobProgress['start']) !!};
        var dataSetApproval = {!! json_encode($jobProgress['approval']) !!};
        var dataSetCompleted = {!! json_encode($jobProgress['completed']) !!};
        var dataSetOutOfDate = {!! json_encode($jobProgress['out_of_date']) !!};

        var ctx1 = document.getElementById("myAreaChart");
        var myPieChart = new Chart(ctx1, {
            type: 'bar',
            borderWidth: 1,
            data: {
                labels: dataLabels,
                datasets: [
                    {
                        label: '{{ \App\Helpers\Constant::STATUS_START }}',
                        backgroundColor: "aqua",
                        data: dataSetStart
                    },
                    {
                        label: '{{ \App\Helpers\Constant::STATUS_APPROVAL }}',
                        backgroundColor: "blue",
                        data: dataSetApproval
                    },
                    {
                        label: '{{ \App\Helpers\Constant::STATUS_COMPLETED }}',
                        backgroundColor: "lime",
                        data: dataSetCompleted
                    },
                    {
                        label: '{{ \App\Helpers\Constant::STATUS_OUT_OF_DATE }}',
                        backgroundColor: "red",
                        data: dataSetOutOfDate
                    }
                ]
            },
        });
    </script>
@endsection
