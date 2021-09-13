<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
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
        $category = Product::all()->where('category_id',$list['category_id'])->take(3);

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
      
        
        return redirect()->route('frontend.index');
    }
    public function cart( )
    {     
        $data = request()->session()->get('add_to_cart');
       if($data != null){
        $data  = array_unique($data, SORT_REGULAR);
       }
        return view('frontend/cart', ['data' => $data]);
    }
    public function save_cart( )
    {     
        $total_price=0;
        $user = Auth::user();
        $userdrtail = request()->except("_token");
        $data = request()->session()->get('add_to_cart');
        $data  = array_unique($data, SORT_REGULAR);
        foreach($data as $c){
            $total_price  += $c['price'] ;
        }       
        $invoice = [
               'user_id' => $user->id,
               'name' => $user->name,
               'number' => $userdrtail['number'],
               'address' => $userdrtail['address'],
               'total_price' =>  $total_price,
               'status' => 1
        ];
       $update = Invoice::Create($invoice);
       foreach($data as $c){
        $invoicedetail=[ 
            'invoice_id' => $update->id,
            'product_id'=>$c['id'], 
            'unit_price'=>$c['price']*$c['quantity'], 
            'quantity' => $c['quantity']
        ];
        InvoiceDetail::Create($invoicedetail);
    }
    request()->session()->forget('add_to_cart');
    return redirect()->route('frontend.index', ['success' => 'Thêm vào Thành công']);
       
    }
    public function delete_cart( )
    {  
        request()->session()->forget('add_to_cart');
        return redirect()->route('frontend.index');
    }
}
