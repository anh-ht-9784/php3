<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $list = Product::all();
        $list->load('categories');
        // dd($list);
        return view('admin/products/index', ['data' => $list]);
    }

    public function create()
    {
        $list = Category::all();
        return view('admin/products/create', ['data' => $list]);
    }
    public function store()
    {
        $data = request()->except("_token");
        $data['image'] = 'https://e1.pngegg.com/pngimages/925/517/png-clipart-coraje-courage-the-cowardly-dog-illustration-thumbnail.png';

        Product::Create($data);

        return redirect()->route('admin.products.index');
    }
    public function edit($id)
    {
        $data = Product::find($id);
        $list = Category::all();
        return view('admin/products/edit', ['data' => $data, 'list' => $list]);
    }
    public function update($id)
    {
        $Product = Product::find($id);
        $data = request()->except("_token");
        $data['image'] = 'https://e1.pngegg.com/pngimages/925/517/png-clipart-coraje-courage-the-cowardly-dog-illustration-thumbnail.png';

        $Product->update($data);
        return redirect()->route('admin.products.index');
    }
    public function delete($id)
    {
        $Product = Product::find($id);
        $Product->delete($id);
        return redirect()->route('admin.products.index');
    }
}
