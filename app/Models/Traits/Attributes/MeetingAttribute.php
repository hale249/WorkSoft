<?php

namespace App\Models\Traits\Attributes;

use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;

trait MeetingAttribute
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
          '.$this->delete_button.'
        </div>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute(): string
    {
        return '<a href="'.route('backend.meeting.edit', $this->id).'" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute(): string
    {
        if (Helper::checkRole(Auth::user())) {
            return '<a href="' . route('backend.meeting.show', $this->id) . '" data-toggle="tooltip" data-placement="top" title="Show" class="btn btn-success btn-sm"><i class="fas fa-info-circle"></i></a>';;
        }
        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute(): string
    {
        if (Helper::checkRole(Auth::user())) {
            return '<a href="' . route('backend.meeting.destroy', $this->id) . '"
                 data-trans-button-cancel="' . __('labels.general.cancel') . '"
                 data-trans-button-confirm="' . __('labels.general.delete') . '"
                 data-trans-title="' . __('strings.confirm_delete') . '"
                 class="btn btn-danger js-confirm-delete btn-sm"><i class="fas fa-trash"></i></a>';
        }
        return  '';
    }
}
