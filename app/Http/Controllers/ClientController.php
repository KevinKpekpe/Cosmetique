<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class ClientController extends Controller
{
    public function index(){

    //     $order = Order::find(2);
    //    dd( unserialize($order->products));
       // dd(Cart::content());
        return view('clients.index',['products'=>Product::paginate(3)]);
    }
    public function all(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('clients.products',['products'=>Product::paginate(6),'categories'=>$categories,'brands'=>$brands]);
    }
    public function show(Product $product){
        $products = Product::query()->where('id','!=',$product->id)->get();
        return view('clients.show',['product' => $product,'products'=>$products]);
    }
    public function contact(){
        return view('clients.contact');
    }
    public function sendMessage(Request $request){
        dd($request->all());
    }
}
