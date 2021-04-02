<?php

namespace App\Helpers\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileHelperTrait
{

    public function uploadFile($attachment, $path = 'images')
    {
        $imageName = time() . $attachment->getClientOriginalName();
        $pathToFile = $path . '/'. $imageName;

        Storage::put($pathToFile, fopen($attachment, 'r+'), 'public');

        $url = Storage::url($pathToFile);

        return [
            'file_name' => $imageName,
            'url' => $url
        ];
    }
}
