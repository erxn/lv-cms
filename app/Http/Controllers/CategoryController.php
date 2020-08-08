<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $datas = Category::all();
        return view('category.index', ['datas' => $datas]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
        ]);

        $data = Category::create(array_merge(
            $request->all(),
            [
                'created_by' => Auth::id(),
                'created_at' => Carbon::create($request->published_at)
            ]
        ));

        return redirect()->back();
    }

    public function update($id)
    {
        $datas = Category::findOrFail($id);

        return view('category.update', ['datas' => $datas]);
    }

    public function store(Request $request)
    {
        $data = Category::findOrFail($request->id);

        $this->validate($request, [
            'category' => 'required',
        ]);

        $data->update(array_merge(
            $request->all(),
            [
                'created_by' => Auth::id(),
                'created_at' => Carbon::create($request->published_at)
            ]
        ));

        return redirect()->route('category_index');
    }


    public function delete(Request $request)
    {
        $data = Category::findOrFail($request->id);

        $data->delete();

        return redirect()->route('category_index');
    }
}
