@extends('clients.base')
@section('content')
<main>
    <div class="ui container">

        <h2>S'inscrire</h2>

        <div class="ui segment">
            <form class="ui form" action="{{route('doSignup')}}" method="POST">
                @csrf
                <div class="field">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Email">
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="field">
                    <label>Mot de passe</label>
                    <input type="password" name="password" placeholder="Mot de passe">
                </div>
                <div class="field">
                    <label>Confirmation du Mot passe :</label>
                    <input type="password" name="password_confirmation" placeholder="Mot de passe">
                </div>
                <div class="ui buttons">
                    <button class="ui button">S'inscrire</button>
                </div>
            </form>
        </div>

    </div>
</main>
@endsection


