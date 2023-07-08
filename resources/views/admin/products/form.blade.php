@extends('admin.base')
@section('content')
<h1 class="ui header">
    @if ($product->exists)
    Modifier {{ $product->title }}
@else
    Creer
@endif
<form class="ui form" action="{{route($product->exists ? 'admin.product.update': 'admin.product.store',$product)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($product->exists ? 'PUT' : 'POST')
        <div class="field">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" placeholder="Titre du produit" value="{{old('title',$product->title)}}">
            @error('title')
            <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" placeholder="Slug du produit"  value="{{old('slug',$product->slug)}}">
            @error('slug')
            <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label for="brand">Marque</label>
            <select id="brand" name="brand_id">
                <option value="">Sélectionnez une marque</option>
                @foreach ($brands as $brand)
                <option @selected(old('brand_id',$product->brand_id) == $brand->id) value="{{$brand->id}}">{{$brand->title}}</option>
                @endforeach
            </select>
            @error('brand')
            <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label for="category">Catégorie</label>
            <select id="category" name="category_id">
                <option value="">Sélectionnez une catégorie</option>
                @foreach ($categories as $category)
                <option @selected(old('category_id',$product->category_id) == $category->id) value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            @error('category')
            <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Description du produit">{{old('description',$product->description)}}</textarea>
            @error('description')
            <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label for="price">Prix</label>
            <input type="number" id="price" name="price" placeholder="Prix du produit"  value="{{old('price',$product->price)}}">
            @error('price')
            <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label for="image">Image</label>
            <input type="file" id="image" name="image"  value="{{old('image',$product->image)}}">
            @error('image')
            <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label for="price">Stock</label>
            <input type="number" id="stock" name="stock" placeholder="Quantité en Stock"  value="{{old('stock',$product->stock)}}">
            @error('price')
            <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label for="active">Actif</label>
            <input type="hidden" value="0" name="active">
            <div class="ui toggle checkbox">
                <input @checked(old('active',$product->active ?? false)) value="1"  type="checkbox" id="active" name="active">
                <label for="active"></label>
            </div>
            @error('active')
            <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <button class="ui button" type="submit">
        @if ($product->exists)
            Modifier
        @else
            Creer
        @endif
        </button>
    </form>
@endsection
