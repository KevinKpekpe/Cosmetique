@extends('admin.base')
@section('content')
    <h1 class="ui header">
        @if ($brand->exists)
        Modifier {{ $brand->title }}
    @else
        Creer
    @endif
    </h1>
    <form class="ui form" action="{{route($brand->exists ? 'admin.brand.update': 'admin.brand.store',$brand)}}" method="POST">
        @csrf
        @method($brand->exists ? 'PUT' : 'POST')
        <div class="field">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" placeholder="Titre de la marque" value="{{old('title',$brand->title)}}">
            @error('title')
            <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Description de la marque" >{{old('description',$brand->description)}}</textarea>
            @error('description')
            <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <button class="ui button" type="submit">
        @if ($brand->exists)
            Modifier
        @else
            Creer
        @endif
        </button>
    </form>
@endsection
