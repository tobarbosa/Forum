<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    public function index(User $user)
    {
        $topics = $user->topics->isNotEmpty() ? $user->topics()->orderBy('created_at', 'desc')->paginate(10) : new Collection;

        return view('user', [
            'user' => $user,
            'topics' => $topics
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
