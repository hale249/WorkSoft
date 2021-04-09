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
        return '<a href="" class="btn btn-primary btn-sm edit-user" data-toggle="modal"
         data-id="'.$this->id.'" data-target="#editUserModal" title="Edit user">
         <i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute(): string
    {
        return '<a href="' . route('users.destroy', $this->id) . '"
                 class="btn btn-danger" title="Delete" data-id="' . $this->id . '"
                 data-action="delete" data-confirm="Are you sure you want to delete this User ?">
                 <i class="fas fa-trash"></i>
                 </a>';
    }

    public function getChangePasswordButtonAttribute(): string
    {
        return '<a href="" class="btn btn-warning btn-sm edit-password" data-toggle="modal"
         data-id="'.$this->id.'" data-target="#changePasswordUserModal" title="Change password">
         <i class="fas fa-key"></i></a>';
    }


    public function getRoleNameAttribute()
    {
        if ($this->role) {
            return '<span class="badge badge-pill" style="background-color: #58F09E; color: #000000">Admin</span>';
        }
        return  '';
    }
}
