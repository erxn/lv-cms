<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::pluck('name', 'id')->toArray();
        $posts = Post::all();

        return view('post.index', compact('categories', 'posts'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:60',
            'author' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'featimg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('featimg');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/front');
        $image->move($destinationPath, $input['imagename']);

        if ($request->has('draft')) {
            $status = 'draft';
        } else {
            $status = 'published';
        }

        $data = Post::create(array_merge(
            $request->all(),
            [
                'status' => $status,
                'published_at' => Carbon::create($request->published_at),
                'created_by' => Auth::id()
            ]
        ));

        return redirect()->back();
    }

    public function update($id)
    {
        $datas = Post::findOrFail($id);

        // print_r($datas);

        return view('post.update', ['datas' => $datas]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:60',
            'author' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            // 'featimg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->get('title');
        $post->author = $request->get('author');
        $post->category_id = $request->get('category_id');
        $post->content = $request->get('content');
        // $post->featimg = $request->get('featimg') ?? 'featimg.png';
        $post->featimg = $request->get('featimg');

        if ($request->hasFile('featimg')) {
            $image = $request->file('featimg');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/front');
            $image->move($destinationPath, $imagename);
            $post->featimg = $imagename;
        }

        if ($request->has('draft')) {
            $post->status = 'draft';
        } else {
            $post->status = 'published';
        }

        $post->published_at = Carbon::create($request->published_at);
        $post->created_by = Auth::id();

        // var_dump($post->featimg);
        // exit;

        $post->save();
        return redirect()->route('post_index')->with('success', 'File uploaded successfully.');
    }

    // public function store(Request $request)
    // {
    //     $data = Post::findOrFail($request->id);

    //     $this->validate($request, [
    //         'title' => 'required|max:60',
    //         'author' => 'required',
    //         'category_id' => 'required',
    //         'content' => 'required',
    //         'featimg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $image = $request->file('featimg');
    //     $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
    //     $destinationPath = public_path('/assets/front');
    //     $image->move($destinationPath, $input['imagename']);

    //     if ($request->has('draft')) {
    //         $status = 'draft';
    //     } else {
    //         $status = 'published';
    //     }

    //     $data->update(array_merge(
    //         $request->all(),
    //         [
    //             'status' => $status,
    //             'published_at' => Carbon::create($request->published_at),
    //             'created_by' => Auth::id()
    //         ]
    //     ));

    //     return redirect()->route('post_index');
    // }


    public function delete(Request $request)
    {
        $data = Post::findOrFail($request->id);

        $data->delete();

        return redirect()->route('post_index');
    }

    public function detail($id)
    {
        $categories = Category::all();
        $post = Post::where('id', $id)->first();

        return view('single', compact('post', 'categories'));
    }

    public function byCategory($catid)
    {
        $categories = Category::all();
        $posts = Post::where('category_id', $catid)->orderBy('created_at', 'desc')->paginate(5);

        return view('category', compact('posts', 'categories'));
    }
}
