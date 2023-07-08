@extends('clients.base')
@section('content')
<main>
    <div class="ui container">

        <h2>S'inscrire</h2>

        <div class="ui segment">
            <form class="ui form" action="{{route('doSignup')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="field">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Email" value="{{old('name')}}">
                    @error('name')
                    <div class="ui pointing red basic label">{{ $message }}</div>
                    @enderror
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                @error('email')
                    <div class="ui pointing red basic label">{{ $message }}</div>
                @enderror
                </div>
                <div class="field">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="avatar"  value="{{old('avatar')}}">
                    @error('avatar')
                    <div class="ui pointing red basic label">{{ $message }}</div>
                    @enderror
                </div>
                <div class="field">
                    <label>Mot de passe</label>
                    <input type="password" name="password" placeholder="Mot de passe">
                @error('password')
                    <div class="ui pointing red basic label">{{ $message }}</div>
                @enderror
                </div>
                <div class="field">
                    <label>Confirmation du Mot passe :</label>
                    <input type="password" name="password_confirmation" placeholder="Mot de passe">
                @error('password_confirmation')
                    <div class="ui pointing red basic label">{{ $message }}</div>
                @enderror
                </div>
                <div class="ui buttons">
                    <button class="ui button">S'inscrire</button>
                </div>
            </form>
        </div>

    </div>
</main>
@endsection


