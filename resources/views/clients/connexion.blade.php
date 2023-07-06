<!DOCTYPE html>
<html>
<head>
	<title>Connexion | KeKeShop</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
	<link rel="stylesheet" href="style.css">
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
							<a href="#" class="item">Accueil</a>
							<a href="#" class="item">Produits</a>
							<div class="ui simple dropdown item">
								Promotions
								<i class="dropdown icon"></i>
								<div class="menu">
									<a href="#" class="item">Promo 1</a>
									<a href="#" class="item">Promo 2</a>
									<a href="#" class="item">Promo 3</a>
								</div>
							</div>
							<a href="#" class="item">Contact</a>
							<div class="right menu">
								<a href="#" class="item active">Se connecter</a>
								<a href="#" class="item">
									<div class="ui primary button">S'inscrire</div>
								</a>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>

	<main>
		<div class="ui container">

			<h2>Connexion</h2>

			<div class="ui segment">
				<form class="ui form">
					<div class="field">
						<label>Email</label>
						<input type="email" name="email" placeholder="Email">
					</div>
					<div class="field">
						<label>Mot de passe</label>
						<input type="password" name="password" placeholder="Mot de passe">
					</div>
					<div class="ui buttons">
						<button class="ui button">Connexion</button>
						<div class="or"></div>
						<a href="#" class="ui button">Mot de passe oublié ?</a>
					</div>
				</form>
			</div>

		</div>
	</main>

	<footer>
		<div class="ui container">
			<div class="ui stackable grid">
				<div class="eight wide column">
					<h4 class="ui header">KeKeShop</h4>
					<p>Nous sommes une entreprise spécialisée dans la vente de produits cosmétiques de qualité.</p>
				</div>
				<div class="eight wide column">
					<h4 class="ui header">Liens utiles</h4>
					<div class="ui link list">
						<a href="#" class="item">Accueil</a>
						<a href="#" class="item">Produits</a>
						<a href="#" class="item">Promotions</a>
						<a href="#" class="item">Contact</a>
						<a href="#" class="item active">Se connecter</a>
						<a href="#" class="item">S'inscrire</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
	
</body>
</html>