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
     * @param null $path
     * @return string
     */
    public function uploadFile(UploadedFile $file, $path = null, $folder = 'images'): string
    {
        $path = $path ? '/' . $folder . '/' . $path : '/' . $folder;
        Storage::disk('local')->put($path, $file);

        return rtrim($path, ' /') . '/' . $file->hashName();
    }
}
