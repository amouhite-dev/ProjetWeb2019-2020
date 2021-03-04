  <!DOCTYPE html> 
    <html>
        <head>
		    <meta charset="utf-8"/>
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    
		    <title>Mon Profil</title>

		    <link rel = stylesheet type="text/css" href="MonProfil.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		</head>
		<body>
			
        <a class = "titre" href = "AccueilAcheteur.php"><h1 class = "titre">G-MARKET</h1></a>
        <hr style = "opacity : 0.2;">
			<div class="col-sm-3 container">
				<div class="card">
					<img src="../images/profile.jpg" class="card-img-top" alt="profile">
					<hr>
				  	<div class="card-body">
				    	<p style="text-align:center;"><strong id="user-name">Nom: <?php echo $_SESSION['login'];?></strong></p>
				        <p style="text-align:center;"><strong id="user-frid">Numero Matricule : </strong><?php echo $_SESSION['uid'];?></p>
				        <p style="text-align:center;" id="user-role"><strong>Rôle : </strong><?php echo $_SESSION['role'];?></p>
				  	</div>
				  	<ul class="list-group list-group-flush">
					    <li class="list-group-item"><i class="fas fa-clock"></i><a href="HistoriqueAcheteur.php"> Historiques </a></li>

					    <li class="list-group-item"><i class="fas fa-home"></i><a href="AccueilAcheteur.php">  Retour à l'accueil</a></li>

						<li class="list-group-item"><i class="fas fa-sign-out-alt"></i><a href="../Identification/Deconnexion.php">  Deconnexion</a></li>
				  	</ul>
				</div>
			</div>
			 <hr style = "opacity : 0.1;">
        
	        <h6><center style="color: white; padding-bottom: 20px">Copyright &copy; 2019 g-market Inc</center></h6>
	        <div class="col-md-4 col-sm-4 col-xs-12"></div>
		</body>
	</html>