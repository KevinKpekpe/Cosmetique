<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.cart');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $dupplicata = Cart::search(function ($cartItem,$rowId) use ($request) {
            return $cartItem->id == $request->product_id;
        });
        if($dupplicata->isNotEmpty()){
            return redirect()->route('welcome')->with('success','Produit existe déjà dans le panier');
        }
        $product = Product::find($request->product_id);
        Cart::add($product->id, $product->title,1,$product->price)->associate('App\Models\Product');
        return redirect()->route('welcome')->with('success','Produit ajouté avec success dans le panier');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return back()->with('success','Produit supprimé avec success dans le panier');
    }
}
