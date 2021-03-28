<div class="card-header">
    <h5 class="text-muted">ATTACHMENTS</h5>
</div>
<div class="card-body">
    <div class="form-group">
        <form action="/file-upload" class="dropzone dz-clickable" id="exampleDropzone">
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
                <th style="width: 80px">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 20px"><img alt="Material Sharp icon"
                                             src="https://luckens.ixosoftware.com/images/icon-pdf.png"
                                             style="height:20px;width:20px;"></td>
                <td>Attachment file name 1.pdf</td>
                <td>20 Oct 2020 11:30 AM</td>
                <td>
                    <a href="/files/attachment-file-name-1.pdf" class="text-info" title="Open file" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-info icon-lg">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                    </a>
                    <a href="#" title="Delete" class="text-danger" data-toggle="modal"
                       data-target="#deleteAttachmentConfirm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-trash-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path
                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>
                    </a>
                </td>
            </tr>

            <tr>
                <td style="width: 20px"><img alt="Material Sharp icon"
                                             src="https://luckens.ixosoftware.com/images/icon-word.png"
                                             style="height:20px;width:20px;"></td>
                <td>Attachment file name 2.docx</td>
                <td>20 Oct 2020 15:30 AM</td>
                <td>
                    <a href="/files/attachment-file-name-2.docx" class="text-info" title="Open file" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-info icon-lg">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                    </a>
                    <a href="#" title="Delete" class="text-danger" data-toggle="modal"
                       data-target="#deleteAttachmentConfirm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-trash-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path
                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
