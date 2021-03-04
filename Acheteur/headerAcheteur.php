<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8"/>
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="../Accueil.css">
			
			<title>Bienvenue sur G-MARKET</title>
			
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

			<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		</head>

		<body>
			<header>
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<a class="navbar-brand" href="AccueilAcheteur.php">G-MARKET</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
					    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						    <li class="nav-item active">
					    	    <a class="nav-link" href="listeAlimentAcheteur.php"><i class="fas fa-utensils"></i> Alimentaire <span class="sr-only">(current)</span></a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link" href="listeJouetAcheteur.php"><i class="fas fa-gamepad"></i> Jouets</a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link" href="listeVetementAcheteur.php"><i class="fas fa-tshirt"></i> Vêtements</a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link" href="listeVendeur.php"><i class="fas fa-people-carry"></i> Vendeurs </a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link" href="listeCmdAcheteur.php"><i class="fas fa-shopping-basket"></i> Mon panier</a>
					      	</li>
					    </ul>
					    <form class="form-inline my-2 my-lg-0" method="GET" action="RechercheAcheteur.php">
					        <input class="form-control mr-sm-2" type="search" name="s" placeholder="Recherche ...">
					        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Recherche</button>
					    </form>
					    <a class="nav-link" href="<?php echo "MonProfilAcheteur.php?refresh=" . "1";?>"><i class="fas fa-user"></i> Mon Profil</a>
				  	</div>  
				</nav>
			</header>

