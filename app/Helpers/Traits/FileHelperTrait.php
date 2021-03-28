<?php

namespace App\Helpers\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileHelperTrait
{
    /**
     * Handle upload file
     *
     * @param UploadedFile $file
     * @param string $path
     * @return string
     */
    public function uploadFile(UploadedFile $file, $path = 'images'): string
    {
        $filename = $path  . '-'. time() . '.' . $file->getClientOriginalExtension();

        // save to storage/app/photos as the new $filename
        return $file->storeAs($path, $filename);
    }
}
