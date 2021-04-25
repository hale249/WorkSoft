<?php

namespace App\Models\Traits\Attributes;

trait TaskAttribute
{

    /**
     * @return string
     */
    public function getActionButtonsAttribute(int $jobId): string
    {
        return '
        <div class="btn-group btn-group-sm" role="group" aria-label="Meeting Actions">
          '.$this->getEditButtonAttribute($jobId).'
          '.$this->getDeleteButtonAttribute($jobId).'
        </div>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute(int $jobId): string
    {
        return '<a href="'.route('task.edit', ['id' => $jobId, 'taskId' => $this->id]).'" id="editModalTask" data-toggle="modal" data-target="#editTaskModal" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute(int $jobId): string
    {
        return '<a href="' . route('task.destroy', ['id' => $jobId, 'taskId' => $this->id]) . '"
                 data-trans-button-cancel="' . __('labels.general.cancel') . '"
                 data-trans-button-confirm="' . __('labels.general.delete') . '"
                 data-trans-title="' . __('strings.confirm_delete') . '"
                 class="btn btn-danger js-confirm-delete btn-sm"><i class="fas fa-trash"></i></a>';
    }
}
