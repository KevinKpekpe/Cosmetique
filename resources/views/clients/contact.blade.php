@extends('clients.base')
@section('content')
    <div class="ui container">

        <h2>Nous contacter</h2>

        <div class="ui segment">
            <form class="ui form" action="" method="POST">
                @csrf
                <div class="two fields">
                    <div class="field">
                        <label>Nom</label>
                        <input type="text" placeholder="Nom" name="nom">
                    </div>
                    <div class="field">
                        <label>Prénom</label>
                        <input type="text" placeholder="Prénom" name="prenom">
                    </div>
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="field">
                    <label>Message</label>
                    <textarea name="message"></textarea>
                </div>
                <div class="ui buttons">
                    <button class="ui button">Envoyer</button>
                </div>
            </form>
        </div>

        <div class="ui segment">
            <h3>Informations de contact</h3>
            <p>N'hésitez pas à nous contacter pour toute question ou commentaire concernant nos produits ou nos services.
            </p>
            <p>Vous pouvez nous joindre par téléphone ou par email :</p>
            <ul>
                <li>Téléphone : 01 23 45 67 89</li>
                <li>Email : contact@maboutiquecosmetiques.com</li>
            </ul>
            <p>Notre adresse :</p>
            <p>KeKeShop<br>123 Avenue des Champs-Elysées<br>75008 Paris</p>
        </div>

    </div>
    </main>
@endsection
