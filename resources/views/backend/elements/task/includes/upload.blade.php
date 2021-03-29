<div class="card-header">
    <h5 class="text-muted">ATTACHMENTS</h5>
</div>
<div class="card-body">
    <div class="form-group">
        <form action="{{ route('backend.job.upload-attachment', ['jobId' => $job->id]) }}" class="dropzone dz-clickable" id="job-attachments">
            <div class="dz-default dz-message">
                <button class="dz-button" type="button">Drop files here to upload</button>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width: 20px"></th>
                <th>Name</th>
                <th>Uploaded Date</th>
                <th>Updated by</th>
                <th style="width: 80px">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if (!empty($attachments) && $attachments->count() > 0)
                @foreach($attachments as $attachment)
                    <tr>
                        <td  style="width: 20px"><img alt="{{ $attachment->type }}" src="{{ $attachment->type_icon }}" style="height:20px;width:20px;"></td>
                        <td>{{ $attachment->file_name }}</td>
                        <td>{{ $attachment->created_at->format('d M Y H:i A') }}</td>
                        <td>{{ !empty($attachment->updatedBy) ? $attachment->updatedBy->full_name : '' }}</td>
                        <td>
                            <a href="{{ $attachment->url }}" class="btn btn-success btn-sm" title="Open file in new tab" target="_blank"><i class="fas fa-info-circle"></i></a>
                            <a href="{{ route('backend.job.delete-attachment', ['jobId' => $job->id, 'attachmentId' => $attachment->id]) }}"
                               data-trans-button-cancel="{{ trans('labels.general.cancel') }}"
                               data-trans-button-confirm="{{ trans('labels.general.delete') }}"
                               data-trans-title="{{ trans('strings.confirm_delete') }}"
                               class="btn btn-danger js-confirm-delete btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">
                        <p class="text-muted font-italic">There is no documents attached to this job.</p>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
