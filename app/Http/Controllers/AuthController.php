<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\Contracts\AuthServiceInterface;
use App\Services\Contracts\ImageUploadServiceInterface;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(private AuthServiceInterface $authService)
    {

    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = $this->authService->register($data);
        Auth::login($user);
        return redirect()->route('profile');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $result = $this->authService->login($credentials);
        if ($result) {
            return redirect()->route('profile');
        }
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('login');
    }

    public function profile()
    {
        $user = Auth::user();
        $friends = User::whereNot('id', $user->id)->get();
        return view('profile', compact('user', 'friends'));
    }
}
