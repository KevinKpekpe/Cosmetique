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

        // $order = Order::find(8);
        // dd( unserialize($order->products));
       // dd(Cart::content());
        return view('clients.index',['products'=>Product::inRandomOrder()->take(3)->get()]);
    }
    public function all(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('clients.products',['products'=>Product::paginate(12),'categories'=>$categories,'brands'=>$brands]);
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
    public function profile(){
        return view('clients.profil');
    }
}
