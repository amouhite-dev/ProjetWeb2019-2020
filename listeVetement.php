<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8"/>
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<title>Bienvenue a G-MARKET</title>

			<link rel="stylesheet" type="text/css" href="Accueil.css">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

			<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		</head>

		<body>
			<header>
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<a class="navbar-brand" href="index.php">G-MARKET</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
					    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						    <li class="nav-item active">
					    	    <a class="nav-link" href="listeAliment.php"><i class="fas fa-utensils"></i> Alimentaire <span class="sr-only">(current)</span></a>
					      	</li>

					      	<li class="nav-item">
					        	<a class="nav-link" href="listeJouet.php"><i class="fas fa-gamepad"></i> Jouets</a>
					      	</li>

					      	<li class="nav-item">
					        	<a class="nav-link" href="listeVetement.php"><i class="fas fa-tshirt"></i> Vêtements</a>
					      	</li>
					    </ul>
					    
					    <a class="nav-link" href="Identification/Connexion.php"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
					    
					    <a class="nav-link" href="Identification/Inscription.php"><i class="fas fa-user-plus"></i> S'inscrire</a>

					</div>
				</nav>
			</header>
	
	<?php	
		require("db_config.php");

		try {
			$db = new PDO($dsn, $username, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql =" SELECT  produits.nom as n ,description,users.uid as u,qte,prix,login,pid FROM produits INNER JOIN users WHERE ctid = 2 AND produits.uid = users.uid";

			$res = $db->prepare($sql);
			$res->execute();
			
			if ($res->rowCount()==0){
			    echo "<center><img src = \"images/pagevide.jpeg\" alt=\"page vide\" ></center>";
			} else{
			?>
				<?php
	                if (isset($_POST['qte']) || isset($_POST['acheter'])) {
	            ?>
				        <div class="alert alert-info alert-dismissible">
				            <button type="button" class="close" data-dismiss="alert">&times;</button>
			                <strong> <?php echo $resultat; ?>!</strong>
	                    </div>
	            <?php
	                }
	            ?>
		    	<div class="row row-cols-1 row-cols-md-3">
	            <?php
			        foreach($res as $row) {
			    ?>
						<div class="col mb-4">
						    <div class="card">
						        <img src="images/vetementPhoto.jpg" class="card-img-top" alt="photo indisponible">
						        <div class="card-body">
						        	
						            <h5 class="card-title"><?php echo htmlspecialchars($row["n"])?></h5>
						            <p class="card-text"><?php echo htmlspecialchars($row["description"])?></p>
						            <p class="card-text"><?php echo htmlspecialchars($row["login"])?></p>
						            <h6 class="card-text" style="color: red;"><?php echo htmlspecialchars($row["prix"])?>€</h6>
						            <p>
						                <form method="POST" action="Identification/Connexion.php">
											<button type="submit" name="acheter" class="btn btn-primary register">Acheter</button>
										</form>   
						            </p>
						        </div>
						    </div>
					    </div>
				<?php
					};
				?>
				</div>
			<?php
				$db=null;
			}
		} catch (PDOException $e){
			echo "Erreur SQL: ".$e->getMessage();
		}

		?>


    <footer class="page-footer font-small unique-color-dark">
      <div class="container text-center text-md-left mt-5" style="padding-top: 50px;">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase font-weight-bold">
              A PROPOS
            </h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p style="padding-bottom: 20px;">
                G-MARKET est une entreprise basée en France et dans d'autre pays 
                européen; avec un capital de plus de 100 000 000€. Nous somme spécialisé dans la vente de différentes sortes de produit utiles a l'homme. 
                <span style="color: blue; font-weight: bold;">
                  Actuellement nous somme le 1er siteweb le plus visité en France et 
                  5ème le plus visité dans le monde
                </span>
              </p>
          </div>
             
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase font-weight-bold">
              SERVICES
            </h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p style="padding-bottom: 20px;">
              <a href="Identification/Inscription.php" class="liens">Devenir Vendeur/ Acheteur</a>
            </p>
          </div>
                
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase font-weight-bold">
              CONTACT
            </h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>
                <i class="fas fa-home mr-3"></i> Paris 75001, France</p>
              <p>
                <i class="fas fa-envelope mr-3"></i> info@g-market.com</p>
              <p>
                <i class="fas fa-phone mr-3"></i> +33 1 23 45 67 88</p>
              <p style="padding-bottom: 20px;">
                <i class="fas fa-print mr-3"></i> +33 1 25 44 65 89</p>
          </div>
        </div>
      </div>

      <div class="list-unstyled list-inline text-center">
        <div class="list-inline-item">
          <a href="#"><i class="fab fa-facebook-f white-text mr-4"></i></a>
          <a href="#"><i class="fab fa-twitter white-text mr-4"> </i></a>
          <a href="#"><i class="fab fa-linkedin-in white-text mr-4"> </i></a>
          <a href="#"><i class="fab fa-instagram white-text mr-4"> </i></a>
        </div>
      </div>

      <hr>

      <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="index.php"> g-market.com</a>
      </div>
    </footer>
    </body>
    </html>
