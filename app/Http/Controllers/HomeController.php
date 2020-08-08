<?php

namespace App\Http\Controllers;

use App\Home;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();

        $counts = [];
        $counts['postCount'] = Post::all()->count();
        $counts['catCount'] = Category::all()->count();
        $counts['userCount'] = User::all()->count();

        return view('home', compact('categories', 'posts', 'counts'));
    }
}
