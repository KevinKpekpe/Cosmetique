<!DOCTYPE html>
<html>
<head>
	<title>KeKeShop | Accueil</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('extra-meta')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
	<link rel="stylesheet" href="style.css">
    @yield('extra-script')
</head>
<body>

    <header>
        <div class="ui container">
            <div class="ui stackable grid">
                <div class="four wide column">
                    <h1 class="ui header">KeKeShop</h1>
                </div>
                <div class="twelve wide column">
                    <nav>
                        <div class="ui secondary menu">
                            <a href="{{route('welcome')}}" class="item">Accueil</a>
                            <a href="{{route('products')}}" class="item">Produits</a>
                            <a href="{{route('contact')}}" class="item">Contact</a>
                            <div class="right menu">
                                <a href="#" class="item">Se connecter</a>
                                <a href="#" class="item">
                                    <div class="ui primary button">S'inscrire</div>
                                </a>
                                <a href="{{route('cart.index')}}" class="item">
                                    <div class="ui primary button">Panier {{Cart::count()}}</div>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
@if (session('success'))
<div class="ui positive message">
    <i class="close icon"></i>
    <div class="header">
        Success
    </div>
    <p>{{ session('success') }}</p>
</div>
@endif
