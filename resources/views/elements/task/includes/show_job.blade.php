<div class="form-group row">
    <label class="col-md-2 form-control-label" for="name">Tên công việc</label>

    <div class="col-md-10">
        {{ $job->name }}
    </div><!--col-->
</div>

<div class="form-group row">
    <label class="col-md-2 form-control-label" for="name">Xếp loại đầu việc</label>

    <div class="col-md-10">
        {{ $job->job_ranting }}
    </div><!--col-->
</div>

<div class="form-group row">
    <label class="col-md-2 form-control-label" for="name">Người phụ trách công việc</label>

    <div class="col-md-10">
        {{ $job->user->full_name }}
    </div><!--col-->
</div>
<div class="form-group row">
    <label class="col-md-2 form-control-label" for="name">Điểm</label>

    <div class="col-md-10">
        {{ $job->point_of_work }}
    </div><!--col-->
</div>

<div class="form-group row">
    <label class="col-md-2 form-control-label" for="name">Người hỗ trợ</label>

    <div class="col-md-10">
        {{ !empty($job->personSupport) ? $job->personSupport->full_name : '' }}
    </div><!--col-->
</div>

<div class="form-group row">
    <label class="col-md-2 form-control-label" for="name">Điểm hỗ trợ</label>

    <div class="col-md-10">
        {{ $job->point_of_work_sp }}
    </div><!--col-->
</div>
<div class="form-group row">
    <label class="col-md-2 form-control-label" for="name">Nngười quản lý công việc</label>

    <div class="col-md-10">
        {{ !empty($job->personMission) ? $job->personMission->full_name : '' }}
    </div><!--col-->
</div>

<div class="form-group row">
    <label class="col-md-2 form-control-label" for="name">Làm đến</label>

    <div class="col-md-10">
        {{ $job->deadline }}
    </div><!--col-->
</div>


<div class="form-group row">
    <label class="col-md-2 form-control-label" for="description">Nội dung</label>

    <div class="col-md-10">
        @if($job->description)
            {{ $job->description }}
        @else
            @lang('labels.general.empty')
        @endif
    </div><!--col-->
</div>

<a href="{{ route('backend.jobs.show', $job->id) }}" class="btn btn-success btn-sm">Chi tiết</a>
