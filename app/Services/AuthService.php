<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    public function __construct(private ImageUploadService $imageUploadService) {

    }
    public  function register(array $data)
    {
        $fileName = $this->imageUploadService->imageUpload($data['photo'], 'users');
        $data['profile_photo_path'] = $fileName;
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        return $user;
    }

    public function login(array $data) {
        if (Auth::attempt($data)) {
            return true;
        }

        return false;
    }

    public function logout() {
        Auth::logout();
    }
}
