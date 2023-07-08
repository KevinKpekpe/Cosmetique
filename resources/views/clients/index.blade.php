@extends('clients.base')
@section('content')
<main>
    <div class="ui container">
        <div class="ui stackable grid">
            <div class="eight wide column">
                <h2>Bienvenue sur KeKeShop</h2>
                <p>Nous proposons une large sélection de produits cosmétiques de qualité pour tous les types de peau. Nos produits sont soigneusement sélectionnés pour offrir des résultats visibles et durables. Découvrez notre gamme complète de produits pour le visage, le corps et les cheveux.</p>
                <a href="{{route('products')}}" class="ui button primary">Découvrez nos produits</a>
            </div>
            <div class="eight wide column">
                <img src="{{asset('abouts/about3.jpg')}}"  alt="Produits cosmétiques">
            </div>
        </div>
    </div>

    <section class="ui inverted vertical segment">
        <div class="ui container">
            <h2>Nos produits les plus vendus</h2>
            <div class="ui stackable three column grid">
                @foreach ($products as $product)
                <div class="column">
                    <div class="ui card">
                        <div class="image">
                            <img src="/storage/{{$product->image}}" alt="Produit cosmétique">
                            <span class="ui green label" style="position:absolute; top:0; right:0;">In Stock</span>
                        </div>
                        <div class="content">
                            <a href="#" class="header">{{$product->title}}</a>
                            <div class="meta">
                                <span class="date">{{$product->price}}</span>
                            </div>
                            <div class="description">
                                {{substr($product->description, 0,15)}} ...
                            </div>
                        </div>
                        <div class="extra content">
                            <form class="ui form" action="{{route('cart.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="ui buttons">
                                    <button type="submit" class="ui  black button">Ajouter au Panier </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
