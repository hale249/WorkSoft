<?php

namespace App\Models\Traits\Attributes;

use App\Helpers\PermissionConstant;
use Illuminate\Support\Facades\Hash;

trait UserAttribute
{
    /**
     * @param $password
     */
    public function setPasswordAttribute($password) : void
    {
        // If password was accidentally passed in already hashed, try not to double hash it
        if (
            (\strlen($password) === 60 && preg_match('/^\$2y\$/', $password)) ||
            (\strlen($password) === 95 && preg_match('/^\$argon2i\$/', $password))
        ) {
            $hash = $password;
        } else {
            $hash = Hash::make($password);
        }

        $this->attributes['password'] = $hash;
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute(): string
    {
        return '
        <div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
          '.$this->edit_button.'
          '.$this->change_password_button.'
          '.$this->delete_button.'
        </div>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute(): string
    {
        return '<a href="'.route('backend.users.edit', $this->id).'" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute(): string
    {
        return '<a href="' . route('backend.users.destroy', $this->id) . '"
                 data-trans-button-cancel="' . __('labels.general.cancel') . '"
                 data-trans-button-confirm="' . __('labels.general.delete') . '"
                 data-trans-title="' . __('strings.confirm_delete') . '"
                 class="btn btn-danger js-confirm-delete btn-sm"><i class="fas fa-trash"></i></a>';
    }

    public function getChangePasswordButtonAttribute(): string
    {
        return '<a href="'.route('backend.users.show_form_change_password', $this->id).'" data-toggle="tooltip" data-placement="top" title="Change Password" class="btn btn-warning btn-sm text-white"><i class="fas fa-unlock"></i></a>';
    }


    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
