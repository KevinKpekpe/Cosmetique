@extends('clients.base')
@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
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
                                            <select name="qty" id="qty" data-id="{{ $product->rowId }}">
                                                @for ($i = 1; $i <= 6; $i++)
                                                <option value="{{ $i }}" {{ $product->qty == $i ? 'selected' : ''}}>
                                                    {{ $i }}
                                                </option>
                                                @endfor
                                            </select>
                                        </form>
                                    </td>
                                    <td>{{ $product->subtotal() }}€</td>
                                    <td>
                                        <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ui icon button">
                                                <i class="close icon"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3"><strong>Total de la commande</strong></td>
                                <td><strong>{{ Cart::subtotal() }} €</strong></td>
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
                                        <td>{{ Cart::subtotal() }} €</td>
                                    </tr>
                                    <tr>
                                        <td>Livraison</td>
                                        <td>Gratuite</td>
                                    </tr>
                                    <tr>
                                        <td>Taxe</td>
                                        <td>{{ Cart::tax() }}€</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total</strong></td>
                                        <td><strong>{{ Cart::total() }}€</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('checkout.index') }}" class="ui button primary checkout-button">Passer à la
                                caisse</a>
                        </div>
                    </div>
                </div>
            @else
                <p>Empty Panier</p>
            @endif
        </div>
    </main>

@endsection

@section('extra-js')
    <script>
        var qty = document.querySelectorAll('#qty');
        Array.from(qty).forEach((element) => {
            element.addEventListener('change', function() {
                var rowId = element.getAttribute('data-id');
                var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch(`/cart/${rowId}`, {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                    },
                    method: 'patch',
                    body: JSON.stringify({
                        qty: this.value
                    })
                }).then((data) => {
                    console.log(data);
                    location.reload();
                }).catch((error) => {
                    console.log(error);
                });
            });
        });
    </script>
@endsection
