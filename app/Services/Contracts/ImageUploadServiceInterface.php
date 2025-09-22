<?php

namespace App\Services\Contracts;

use Illuminate\Http\UploadedFile;

interface ImageUploadServiceInterface
{
    public function imageUpload(UploadedFile $image, $folder = 'image'): string;
}
