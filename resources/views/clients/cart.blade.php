@extends('clients.base')
@section('content')

    <main>
        <div class="ui container">
            <h2>Votre panier</h2>
            @if (Cart::count() > 0)
                <div class="ui segment">
                    <table class="ui celled table">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Prix unitaire</th>
                                <th>Quantité</th>
                                <th>Prix total</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $product)
                                <tr>
                                    <td>
                                        <img src="/storage/{{ $product->model->image }}" alt="Crème de jour" width="50"
                                            height="50">
                                        {{ $product->model->title }}
                                    </td>
                                    <td>{{ $product->model->price }}€</td>
                                    <td>
                                        <form action="" class="ui form">
                                            <input type="number" min="1" value="1">
                                        </form>
                                    </td>
                                    <td>30,00 €</td>
                                    <td>
                                        <form action="{{route('cart.destroy',$product->rowId)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="ui icon button">
                                                <i class="close icon"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3"><strong>Total de la commande</strong></td>
                                <td><strong>40,00 €</strong></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="ui segment">
                    <div class="ui grid">
                        <div class="eight wide column">
                            <h4>Code promo</h4>
                            <div class="ui action input">
                                <input type="text" placeholder="Entrez un code promo">
                                <button class="ui button">Appliquer</button>
                            </div>
                        </div>
                        <div class="eight wide column">
                            <h4>Details de la commande</h4>
                            <table class="ui definition table">
                                <tbody>
                                    <tr>
                                        <td>Sous-total</td>
                                        <td>{{Cart::subtotal()}} €</td>
                                    </tr>
                                    <tr>
                                        <td>Livraison</td>
                                        <td>Gratuite</td>
                                    </tr>
                                    <tr>
                                        <td>Taxe</td>
                                        <td>{{Cart::tax()}}€</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total</strong></td>
                                        <td><strong>{{Cart::total()}}€</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{route('checkout.index')}}" class="ui button primary checkout-button">Passer à la caisse</a>
                        </div>
                    </div>
                </div>
            @else
                <p>Empty Panier</p>
            @endif
        </div>
    </main>

@endsection
