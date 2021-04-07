<?php

namespace App\Models\Traits\Attributes;

trait CategoryAttribute
{
    use StatusLabelAttribute;

    /**
     * @return string
     */
    public function getActionButtonsAttribute(): string
    {
        return '
        <div class="btn-group btn-group-sm" role="group" aria-label="Category Actions">
          ' . $this->edit_button . '
          ' . $this->delete_button . '
        </div>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute(): string
    {
        return '<a href="" class="btn btn-primary btn-sm edit-category" data-toggle="modal"
         data-id="'.$this->id.'" data-target="#editCategoryModal" title="Edit category">
         <i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute(): string
    {
        return '<a href="' . route('category.destroy', $this->id) . '"
         class="btn btn-danger" title="Delete" data-id="' . $this->id . '"
         data-action="delete" data-confirm="Are you sure you want to delete this Attribute ?">
         <i class="fas fa-trash"></i>
         </a>';
    }
}
