@extends('clients.base')
@section('content')
<main>
    <div class="ui container">

        <h2>Connexion</h2>

        <div class="ui segment">
            <form class="ui form" action="{{route('doLogin')}}" method="POST">
                @csrf
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                </div>
                @error('email')
                <div class="ui pointing red basic label">{{ $message }}</div>
                @enderror
                <div class="field">
                    <label>Mot de passe</label>
                    <input type="password" name="password" placeholder="Mot de passe">
                </div>
                <div class="ui buttons">
                    <button class="ui button">Connexion</button>
                </div>
            </form>
        </div>

    </div>
</main>
@endsection


