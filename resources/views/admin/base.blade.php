<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dashboard d'administration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <!-- Barre latérale -->
    <div class="ui vertical inverted sidebar menu">
        <a class="item">
            <i class="dashboard icon"></i>
            Dashboard
        </a>
        <div class="item">
            <div class="header"><i class="box icon"></i>Produits</div>
            <div class="menu">
                <a class="item" href="{{route('admin.product.index')}}"><i class="eye icon"></i>Voir les produits</a>
                <a class="item" href="{{route('admin.product.create')}}"><i class="add icon"></i>Ajouter un produit</a>
            </div>
        </div>
        <div class="item">
            <div class="header"><i class="tag icon"></i>Marques</div>
            <div class="menu">
                <a class="item" href="{{route('admin.brand.index')}}"><i class="eye icon"></i>Voir les marques</a>
                <a class="item" href="{{route('admin.brand.create')}}"><i class="add icon"></i>Ajouter une marque</a>
            </div>
        </div>
        <div class="item">
            <div class="header"><i class="list icon"></i>Catégories</div>
            <div class="menu">
                <a class="item" href="{{route('admin.category.index')}}"><i class="eye icon"></i>Voir les catégories</a>
                <a class="item" href="{{route('admin.category.create')}}"><i class="add icon"></i>Ajouter une catégorie</a>
            </div>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="pusher">
        <div class="ui fixed inverted menu">
            <div class="ui container">
                <a href="#" class="ui header item">
                    Dashboard d'administration
                </a>
                <div class="right menu">
                    <a class="ui item">
                        <i class="user icon"></i>
                        Profil
                    </a>
                    <form class="ui item" action="{{ route('admin.logout') }}" method="post">
                        @csrf
                        <button type="submit" class="ui button item">
                            <i class="sign out alternate icon"></i>
                            Déconnexion
                        </button>
                    </form>
                    <a class="ui item sidebar-toggle-button">
                        <i class="sidebar icon"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="ui container" style="margin-top:50px ">
            @yield('content')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <script>
        $('.ui.sidebar-toggle-button').click(function() {
            $('.ui.sidebar').sidebar('toggle');
        });
    </script>
</body>

</html>
