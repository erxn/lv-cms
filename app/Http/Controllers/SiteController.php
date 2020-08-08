<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // $posts = Post::all();
        $posts = Post::where('status', 'published')->orderBy('created_at', 'desc')->paginate(5);

        return view('site', compact('categories', 'posts'));
    }

    public function contact()
    {
        $categories = Category::all();

        return view('contact', compact('categories'));
    }
}
