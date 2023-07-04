@extends('admin.base')
@section('content')
<h1 class="ui header">Liste des produits</h1>

@if (session('success'))
<div class="ui positive message">
    <i class="close icon"></i>
    <div class="header">
        Success
    </div>
    <p>{{ session('success') }}</p>
</div>
@endif
<!-- Formulaire de recherche -->
<div class="ui ">
    <div class="search-form mb-2">
        <form class="ui form" action="" method="get">
            <div class="field">
                <label for="search">Rechercher un Produit</label>
                <div class="ui action input">
                    <input type="text" id="search" name="title" placeholder="Nom du Produit" value="{{$input['title'] ?? ''}}">
                    <button class="ui button">Rechercher</button>
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
        <a href="{{route('admin.product.create')}}" class="ui button primary"><i class="add icon"></i>Ajouter un produit</a>
    </div>
</div>

<!-- Tableau des produits -->
<table class="ui selectable compact celled table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Marque</th>
            <th>Catégorie</th>
            <th>Prix</th>
            <th>Slug</th>
            <th>Image</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
        <tr>
            <td>{{$product->title}}</td>
            <td>{{$product->brand->title}}</td>
            <td>{{$product->category->title}}</td>
            <td>{{$product->price}} $</td>
            <td>{{$product->slug}}</td>
            <td><img src="/storage/{{$product->image}}" alt="Produit 1" style="max-width: 100px;"></td>
            <td>
                <div class="ui toggle checkbox">
                    <input type="checkbox" checked disabled name="active">
                    <label></label>
                </div>
            </td>
            <td class="actions">
                <div style="display: flex">
                    <a href="{{route('admin.product.edit',$product)}}" class="ui button"><i class="edit icon"></i></a>
                    <form action="{{ route('admin.product.destroy', $product) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="ui button negative" type="submit">
                            <i class="trash icon"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @empty

        @endforelse
    </tbody>
</table>
@endsection
