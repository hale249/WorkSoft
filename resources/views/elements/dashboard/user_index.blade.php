@extends('layouts.app')

@section('title', __('Tổng quan'))

@section('content')
    <div class="card">
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
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Công việc
                                    </div>
                                    <small>Tổng số công việc trong 1 năm</small>
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

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Công việc cần
                                        thực hiện
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div
                                                class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $statistical['countJobStart'] }}</div>
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

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Công việc quá hạn
                                    </div>
                                    <div
                                        class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistical['countJobOutOfDate'] }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
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

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Trạng thái công việc</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="myPieChart" width="486" height="245" class="chartjs-render-monitor"
                                        style="display: block; width: 486px; height: 245px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/demo/chart-area-demo.js"></script>--}}
    <script type="text/javascript">
        var dataStatus = '{!! json_encode($responseStatus) !!}';
        var jobProgress = '{!! json_encode($response) !!}';
        var ctx = document.getElementById("myPieChart");
        var myPieChart2 = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    '{{ \App\Helpers\Constant::STATUS_START }}',
                    '{{ \App\Helpers\Constant::STATUS_APPROVAL }}',
                    '{{ \App\Helpers\Constant::STATUS_COMPLETED }}',
                    '{{ \App\Helpers\Constant::STATUS_OUT_OF_DATE }}'
                ],
                datasets: [{
                    data: dataStatus,
                    backgroundColor: ['aqua', 'blue', 'lime', 'red'],
                    hoverBackgroundColor: ['aqua', 'blue', 'lime', 'red'],
                }],
            },
        });

        var ctx1 = document.getElementById("myAreaChart");
        var myPieChart = new Chart(ctx1, {
            type: 'bar',
            labels: [
                '{{ \App\Helpers\Constant::STATUS_START }}',
                '{{ \App\Helpers\Constant::STATUS_APPROVAL }}',
                '{{ \App\Helpers\Constant::STATUS_COMPLETED }}',
                '{{ \App\Helpers\Constant::STATUS_OUT_OF_DATE }}'
            ],
            datasets: [
                {
                    fillColor: "#79D1CF",
                    strokeColor: "#79D1CF",
                    data: jobProgress
                }
            ]
        });
    </script>
@endsection
