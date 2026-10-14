<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('user', [
            'user' => $user
        ]);
    }

    public function show()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(9);
        return view('users', [
            'users' => $users
        ]);
    }
}
