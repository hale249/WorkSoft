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
        return '<a href="" class="btn btn-primary btn-sm edit-meeting" data-toggle="modal"
         data-id="'.$this->id.'" data-target="#editMeetingModal" title="Edit meeting">
         <i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute(): string
    {
        if (Helper::checkRole(Auth::user())) {
            return '<a href="' . route('preview.meeting', $this->uuid) . '" data-toggle="tooltip" data-placement="top" title="Show" class="btn btn-success btn-sm"><i class="fas fa-info-circle"></i></a>';;
        }
        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute(): string
    {
        return  '<a href="' . route('meeting.destroy', $this->id) . '"
                 class="btn btn-danger" title="Delete" data-id="' . $this->id . '"
                 data-action="delete" data-confirm="Are you sure you want to delete this Meeting ?">
                 <i class="fas fa-trash"></i>
                 </a>';
    }
}
