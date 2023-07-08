@extends('clients.base')
@section('content')
<main>
    <div class="ui container">
        <div class="ui stackable grid">
            <div class="four wide column">
                <div class="ui vertical menu">
                    <form class="ui form">
                        <div class="field">
                            <label for="search">Rechercher un produit</label>
                            <div class="ui icon input">
                                <input type="text" placeholder="Rechercher...">
                                <i class="search icon"></i>
                            </div>
                        </div>
                    </form>
                    <div class="item">
                        <h4>Catégories</h4>
                        <div class="menu">
                            @foreach ($categories as $category)
                                <a href="" class="item">{{$category->title}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="item">
                        <h4>Prix</h4>
                        <div class="menu">
                            <a href="#" class="item">Moins de 10 €</a>
                            <a href="#" class="item">10 - 25 €</a>
                            <a href="#" class="item">25 - 50 €</a>
                            <a href="#" class="item">Plus de 50 €</a>
                        </div>
                    </div>
                    <div class="item">
                        <h4>Marques</h4>
                        <div class="menu">
                            @foreach ($brands as $brand)
                                <a href="{{route('products')}}" class="item">{{$brand->title}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="twelve wide column">
                <h2>Tous nos produits cosmétiques</h2>
                <div class="ui stackable three column grid">
                    @foreach ($products as $product)
                    <div class="column">
                        <div class="ui card">
                            <div class="image">
                                <img src="/storage/{{$product->image}}" alt="Produit cosmétique">
                                @if ($product->stock > 0)
                                <span class="ui green label" style="position:absolute; top:0; right:0;">In Stock</span>
                                @else
                                <span class="ui ROD label" style="position:absolute; top:0; right:0;">Out of Stock</span>
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
    </div>
</main>

@endsection
