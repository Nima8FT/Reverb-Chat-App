<?php

namespace Tests\Unit;

use App\Services\ImageUploadService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImageUploadServiceTest extends TestCase
{
    public function test_it_uploads_a_valid_image_to_storage()
    {
        Storage::fake('public');

        $image = UploadedFile::fake()->image('test_image.jpg');

        $service = new ImageUploadService();

        $path = $service->imageUpload($image, 'avatars');

        $this->assertStringContainsString('storage/avatars/', $path);
        $this->assertStringEndsWith('.jpg', $path);

        Storage::disk('public')->assertExists(str_replace('storage/', '', $path));
    }

    public function test_it_throws_exception_for_invalid_file()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid image file.');

        Storage::fake('public');

        $file = UploadedFile::fake()->create('document.pdf', 100);

        $service = new ImageUploadService();

        $service->imageUpload($file);
    }
}
