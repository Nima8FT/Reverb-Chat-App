<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $friends = User::whereNot('id', $user->id)->get();

        return view('profile', compact('user', 'friends'));
    }
}
