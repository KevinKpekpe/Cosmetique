@extends('clients.base')
@section('content')
<div class="ui container">
    <div class="ui stackable grid">
        <div class="four wide column">
            <h2 class="ui header">Profil Utilisateur</h2>
            <div class="ui card">
                <div class="image">
                    <img src="https://via.placeholder.com/150" alt="Avatar">
                </div>
                <div class="content">
                    <a class="header">{{Auth::user()->name}}</a>
                    <div class="meta">
                        <span class="date">{{Auth::user()->email}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="twelve wide column">
            <h2 class="ui header">Historique des Commandes</h2>
            <div class="ui stackable three column grid">
                @foreach (Auth()->user()->orders as $order)
                <div class="column">
                    <div class="ui card">
                        <div class="content">
                            <div class="header">Commande #{{$order->id}}</div>
                            <div class="meta">{{Carbon\Carbon::parse($order->payment_created_at)->format('d/m/Y à H:i')}}</div>
                            <div class="description">
                                <ul>
                                    @foreach (unserialize($order->products) as $product)
                                    <li>{{$product[0]}}  ({{$product[2]}}x)   -   {{$product[1]}} €</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui two buttons">
                                <div class="ui green button">{{$order->amount}} €</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

