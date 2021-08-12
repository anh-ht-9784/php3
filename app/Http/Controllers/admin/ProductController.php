<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Admin\Product\UpdateProducts;
use App\Http\Requests\Admin\Product\StoreProducts;

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
    public function store(StoreProducts  $request )
    {

        $data = request()->except("_token");
        if (empty($data['image']) == false) {
            $image = request()->file('image');
            $image_name = $image->getClientOriginalName();
            request()->file('image')->storeAs('/public/images/products', $image_name);
            $data['image'] = $image_name;
        } else {
            $data['image'] ="giang-ho-tien-bip-noi-tham-lam.jpeg";
        }

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
        $request= request();
        $data = request()->except("_token","image_old");
        if (empty($data['image']) == false) {
            $image = request()->file('image');
            $image_name = $image->getClientOriginalName();
            request()->file('image')->storeAs('/public/images/products', $image_name);
            $data['image'] = $image_name;
        } else {
            $data['image'] =$request['image_old'];
        }
        
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
