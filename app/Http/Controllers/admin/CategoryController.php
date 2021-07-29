<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $list = Category::all();
        $list->load('products');
        // dd($list);
        return view('admin/categories/index', ['data' => $list]);
    }

    public function create()
    {
        return view('admin/categories/create');
    }
    public function store()
    {
        $data = request()->except("_token");


        Category::Create($data);

        return redirect()->route('admin.categories.index');
    }
    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin/categories/edit', ['data' => $data]);
    }
    public function update($id)
    {
        $categories = Category::find($id);
        $data = request()->except("_token");

        $categories->update($data);
        return redirect()->route('admin.categories.index');
    }
    public function delete($id)
    {
        $categories = Category::find($id);
        $delete = Product::where('category_id', $id);
        $delete->delete();
        $categories->delete($id);

        return redirect()->route('admin.categories.index');
    }
}
