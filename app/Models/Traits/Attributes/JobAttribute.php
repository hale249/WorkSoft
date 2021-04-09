<?php

namespace App\Models\Traits\Attributes;

trait JobAttribute
{
/*    use StatusLabelAttribute;*/

    /**
     * @return string
     */
    public function getActionButtonsAttribute(): string
    {
        return '
        <div class="btn-group btn-group-sm" role="group" aria-label="Meeting Actions">
          '.$this->show_button.'
          '.$this->edit_button.'
        </div>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute(): string
    {
        return '<a href="'.route('jobs.edit', $this->id).'" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute(): string
    {
        return '<a href="'.route('jobs.show', $this->id).'" data-toggle="tooltip" data-placement="top" title="Show" class="btn btn-success btn-sm"><i class="fas fa-info-circle"></i></a>';;
    }

    /**
     * @return string
     */
    public function getShowItemButtonAttribute(): string
    {
        return '<a href="'.route('job_task.index', $this->id).'" class="btn btn-info btn-sm">' . __('labels.pages.backend.product.table.view_item') . '</a>';
    }
}
