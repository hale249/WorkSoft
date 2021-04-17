<?php

namespace App\Models\Traits\Attributes;

use App\Helpers\Constant;
use App\Helpers\Helper;
use Carbon\Carbon;

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
        return '<a href="'.route('jobs.show', $this->id).'" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute(): string
    {
        return '<a href="'.route('preview.job', $this->uuid).'" data-toggle="tooltip"  target="_blank" data-placement="top" title="Show" class="btn btn-success btn-sm"><i class="fas fa-info-circle"></i></a>';;
    }

  /*  public function getStatusNameAttribute()
    {
        $now = strtotime(Carbon::now()->toDateString());
        $timeDead = strtotime($this->deadline);
        $tonTai = strtotime($this->finish_at);

        if (empty($tonTai)) {

        }

        if ($timeDead < $tonTai || (empty($tonTai) && $now > $timeDead)) {
            $text = Constant::STATUS_OUT_OF_DATE;
        }

        return $text;
    }*/

}
