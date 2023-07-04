@extends('admin.base')
@section('content')
    <h1 class="ui header">
        @if ($category->exists)
        Modifier {{ $category->title }}
    @else
        Creer
    @endif
    </h1>
    <form class="ui form" action="{{route($category->exists ? 'admin.category.update': 'admin.category.store',$category)}}" method="POST">
        @csrf
        @method($category->exists ? 'PUT' : 'POST')
        <div class="field">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" placeholder="Titre de la category" value="{{old('title',$category->title)}}">
            @error('title')
            <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <div class="field">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Description de la category" >{{old('description',$category->description)}}</textarea>
            @error('description')
            <div class="ui pointing red basic label">{{ $message }}</div>
            @enderror
        </div>
        <button class="ui button" type="submit">
        @if ($category->exists)
            Modifier
        @else
            Creer
        @endif
        </button>
    </form>
@endsection
