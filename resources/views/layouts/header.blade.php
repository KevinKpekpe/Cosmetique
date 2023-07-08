<!DOCTYPE html>
<html>
<head>
	<title>KeKeShop | Accueil</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('extra-meta')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
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
                            <a href="{{route('welcome')}}" class="item"><i class="home icon"></i>Accueil</a>
                            <a href="{{route('products')}}" class="item"><i class="shopping bag icon"></i>Produits</a>
                            <a href="{{route('contact')}}" class="item"><i class="envelope outline icon"></i>Contact</a>
                            <div class="right menu">
                                @auth
                                <span class="item">{{Auth::user()->name}}</span>
                                <div class="item">
                                    <form class="ui form" action="{{route('logout')}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <button class="ui button red"><i class="sign-out icon"></i>Logout</button>
                                    </form>
                                </div>

                                @endauth
                                @guest
                                <a href="{{route('login')}}" class="item"><i class="sign-in icon"></i>Se connecter</a>
                                <a href="{{route('signup')}}" class="item">
                                    <div class="ui primary button"><i class="user plus icon"></i>S'inscrire</div>
                                </a>
                                @endguest
                                <a href="{{route('cart.index')}}" class="item">
                                    <div class="ui primary button"><i class="shopping cart icon"></i>Panier {{Cart::count()}}</div>
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
@if (session('error'))
<div class="ui negative message">
    {{ session('error') }}
</div>
@endif
