<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
{
    if (Auth::user()->role !== 'admin') {
        abort(403, 'Unauthorized access.');
    }

    // If admin, show the page
    return view('posts.index'); // or whatever view you use
}
}
