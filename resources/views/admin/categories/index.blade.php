@extends('admin.base')
@section('content')
<h1 class="ui header">Liste des Categories</h1>
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
<div class="ui">
    <div class="search-form mb-2">
        <form class="ui form" action="" method="get">
            <div class="field">
                <label for="search">Rechercher une categorie</label>
                <div class="ui action input">
                    <input type="text" id="search" name="title" placeholder="Nom de la categorie" value="{{$input['title'] ?? ''}}">
                    <button class="ui button">Rechercher</button>
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
        <a href="{{route('admin.category.create')}}" class="ui button primary"><i class="add icon"></i>Ajouter une categorie</a>
    </div>
</div>

<!-- Tableau des Marques -->
<table class="ui celled table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td>{{$category->title}}</td>
            <td>{{$category->description}}</td>
            <td class="actions">
                <div style="display: flex">
                    <a href="{{route('admin.category.edit',$category)}}" class="ui button"><i class="edit icon"></i></a>
                    <form action="{{ route('admin.category.destroy', $category) }}" method="POST" class="inline">
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
            <tr class="ui negative message">
                <td>Empty Table</td>
            </tr>
        @endforelse
    </tbody>
</table>
    {{ $categories->links() }}
@endsection


