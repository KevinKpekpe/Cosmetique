@extends('clients.base')
@section('content')
<main>
    <div class="ui container">
        <div class="ui stackable grid">
            <div class="eight wide column">
                <img src="/storage/{{$product->image}}" style="width: 400px" alt="Produit cosmétique">
            </div>
            <div class="eight wide column">
                <h2>{{$product->title}}</h2>
                <div class="ui star rating" data-rating="4"></div>
                <span class="date">{{$product->price}}€</span>
                <p>{{$product->description}}</p>
                <strong>Marque : </strong>
                <span class="date">{{$product->brand->title}}</span>
                @if ($product->stock > 0)
                <span class="ui green label">In Stock</span>
                <form class="ui form" action="{{route('cart.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="field">
                        <label>Quantité</label>
                        <input type="number" value="1">
                    </div>
                    <div class="ui buttons">
                        <button type="submit" class="ui  black button">Ajouter au Panier </button>
                    </div>
                </form>
                @else
                <span class="ui red label">Out of Stock</span>
                @endif
            </div>
        </div>
        <div class="twelve wide column">
            <h2>Autres Produits cosmetiques ...</h2>
            <div class="ui stackable three column grid">
                @foreach ($products as $product)
                <div class="column">
                    <div class="ui card">
                        <div class="image">
                            <img src="/storage/{{$product->image}}" alt="Produit cosmétique">
                            @if ($product->stock > 0)
                            <span class="ui green label" style="position:absolute; top:0; right:0;">In Stock</span>
                            @else
                            <span class="ui red label" style="position:absolute; top:0; right:0;">Out of Stock</span>
                            @endif
                        </div>
                        <div class="content">
                            <a href="{{route('product.show',['product'=> $product->id])}}" class="header">{{$product->title}}</a>
                            <div class="meta">
                                <span class="date">{{$product->price}} €</span>
                            </div>
                            <div class="description">
                                {{substr($product->description, 0,15)}} ...
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui two buttons">
                                @if ($product->stock > 0)
                                <form class="ui form" action="{{route('cart.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button type="submit" class="ui black button">Ajouter au Panier</button>
                                </form>
                                <div class="or"></div>
                                @endif

                                <a href="{{route('product.show',['product'=> $product->id])}}" class="ui basic blue button">Détails</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection
