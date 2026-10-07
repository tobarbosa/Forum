<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('user', [
            'user' => $user
        ]);
    }

    public function index()
    {
        $users = User::all();
        return view('users', [
            'users' => $users
        ]);
    }
}
