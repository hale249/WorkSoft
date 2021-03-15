<?php

namespace App\Models\Traits\Attributes;

trait TaskAttribute
{
    /*    use StatusLabelAttribute;*/

    /**
     * @return string
     */
    public function getActionButtonsAttribute(int $projectId): string
    {
        return '
        <div class="btn-group btn-group-sm" role="group" aria-label="Meeting Actions">
          '.$this->getShowButtonAttribute($projectId).'
          '.$this->getEditButtonAttribute($projectId).'
        </div>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute(int $projectId): string
    {
        return '<a href="'.route('backend.project_task.edit', ['id' => $projectId, 'taskId' => $this->id]).'" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute(int $projectId): string
    {
        return '<a href="'.route('backend.project_task.show', ['id' => $projectId, 'taskId' => $this->id]).'" data-toggle="tooltip" data-placement="top" title="Show" class="btn btn-success btn-sm"><i class="fas fa-info-circle"></i></a>';
    }
}
