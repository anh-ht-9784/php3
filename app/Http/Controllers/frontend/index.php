<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Product;

class index extends Controller
{
    public function index()
    {
        $list = Product::all()->take(9);
        $list->load('categories');
       
        return view('frontend/index', ['data' => $list]);
    }

    public function detail($id)
    {
        $list = Product::find($id);
        $category = Product::all()->where('category_id',$list['category_id']);

        return view('frontend/product_detail', ['data' => $list,'category'=>$category]);

    }
    public function product()
    {
   
        $list = Product::all();
        return view('frontend/product', ['data' => $list]);

    }


    public function addcart($id )
    { 
     
        $cart = isset($_SESSION['cart']) == true ? $_SESSION['cart'] : [];
        // dựa vào id nhận đc, lấy ra thông tin sản phẩm => mảng
        $product = Product::find($id);
       
        $product = $product->toArray();
        $product['sl'] = 1;
     
       
     request()->session()->push('add_to_cart',  $product);
        $data = request()->session()->get('add_to_cart');
      
       
      return redirect()->back()->with('success', 'Thêm sản phẩm thành công');
    }
    public function cart( )
    {     
        $data = request()->session()->get('add_to_cart');
       
        $data  = array_unique($data, SORT_REGULAR);

        return view('frontend/cart', ['data' => $data]);
    }
    public function save_cart( )
    {     
        $data = request()->session()->get('add_to_cart');
       
        $data  = array_unique($data, SORT_REGULAR);
         
        dd(request()->session()->all());
       
    }
}
