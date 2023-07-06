<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Cart::count()<= 0){
            return redirect()->route('products');
        }
        Stripe::setApiKey('sk_test_51NAJv7Igps0lluGj1k7DT8xScXCKszqOHKTULMGyTa2LjesubRIwU7slZUiiy2oZ8I0GB2hDZfpCIMauM69QUpvY00JkIBkiL1');
        $intent = PaymentIntent::create([
            'amount' =>round(Cart::total()) * 100,
            'currency' =>'USD',
        ]);
        $clientSecret =  Arr::get($intent, 'client_secret');
        return view('checkout.index',['clientSecret' =>$clientSecret]);
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
        Cart::destroy();
        $data = $request->json()->all();

        return $data['paymentIntent'];
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
    public function destroy(string $id)
    {
        //
    }
}
