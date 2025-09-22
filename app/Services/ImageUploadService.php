<?php

namespace App\Services;

use App\Services\Contracts\ImageUploadServiceInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadService implements ImageUploadServiceInterface
{
    public function imageUpload(UploadedFile $image, $folder = 'image'): string
    {
        if (! $image->isValid() || ! str_starts_with($image->getMimeType(), 'image/')) {
            throw new \Exception('Invalid image file.');
        }

        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $fileName = time().'_'.str_replace(' ', '_', $originalName).'_'.Str::random(6).'.'.$extension;

        $filePath = $folder.'/'.$fileName;

        Storage::disk('public')->putFileAs($folder, $image, $fileName);

        return 'storage/'.$filePath;
    }
}
