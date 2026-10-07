<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $topics = Topic::orderBy('created_at', 'desc')->take(10)->get();

        return view('home', [
            'topics' => $topics
        ]);
    }
}
