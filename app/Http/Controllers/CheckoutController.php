<?php

namespace App\Http\Controllers;

use App\Models\Order;
use DateTime;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Cart::count() <= 0) {
            return redirect()->route('products');
        }
        Stripe::setApiKey('sk_test_51NAJv7Igps0lluGj1k7DT8xScXCKszqOHKTULMGyTa2LjesubRIwU7slZUiiy2oZ8I0GB2hDZfpCIMauM69QUpvY00JkIBkiL1');
        $intent = PaymentIntent::create([
            'amount' => round(Cart::total()) * 100,
            'currency' => 'USD',
        ]);
        $clientSecret =  Arr::get($intent, 'client_secret');
        return view('checkout.index', ['clientSecret' => $clientSecret]);
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


        $data = $request->json()->all();

        $order = new Order();

        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['amount'];

        $order->payment_created_at = (new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');

        $products = [];
        $i = 0;

        foreach (Cart::content() as $product) {
            $products['product_' . $i][] = $product->model->title;
            $products['product_' . $i][] = $product->model->price;
            $products['product_' . $i][] = $product->qty;
            $i++;
        }

        $order->products = serialize($products);
        $order->user_id = Auth::user()->id;
        $order->save();

        if ($data['paymentIntent']['status'] === 'succeeded') {
            Session::flash('success', 'Paiement réalisé avec succès!');
            return response()->json(['success' => 'Paiement Intent succeeded']);
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
        }
    }
    public function thankyou(){
        return Session::has('success') ? view('checkout.thanks') : redirect()->route('products');
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
