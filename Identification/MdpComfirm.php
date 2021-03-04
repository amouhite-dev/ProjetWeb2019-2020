 <!DOCTYPE html> 
    <html>
        <head>
            <meta charset="utf-8"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel = stylesheet type="text/css" href="PageConnexion.css">
            <title>Mot de passe</title>
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        </head>
        <body class="mdp">
            <a href = "../index.php" class="titre"><h1 class="titre">G-MARKET</h1></a>
            <hr style = "opacity : 0.2;">
            <div class="container">
			
			<form class="form-horizontal" role="form" method="post" action="MotDePasse.php">
                <h2>Changement de mot passe</h2>  
					<?php
                        if (isset($_POST['termine'])) {
                    ?>
                        <div class="alert alert-danger info-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> <?php echo "Erreur"; ?>!</strong> 
                            <?php echo $error ?>
                        </div>
                    <?php
                        }
                    ?>
                    <div class="form-group">
                        <label for="login" class="col-sm-3 control-label">Login </label>
                        <div class="col-sm-9">
                            <input type="text" name="login" placeholder="Identifiant ..." class="form-control" value="<?= $data['login']??""?>" required value="<?php echo htmlspecialchars($login);?>">
                        </div>
                    </div>

				    <div class="form-group">
                        <label for="login" class="col-sm-3 control-label">Nouveau mot de passe </label>
                        <div class="col-sm-9">
                            <input type="password" name="NewMdp" placeholder="Mot de passe ..." size="20" required id="mdp" class="form-control" required value="<?= $data['NewMdp']??"" ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="login" class="col-sm-3 control-label">Comfirmer nouveau mot de passe </label>
                        <div class="col-sm-9">
                            <input type="password" name="NewMdp2" placeholder="Mot de passe ..." size="20" class="form-control" required value="<?= $data['NewMdp2']??"" ?>" >
                        </div>
                    </div>
				<button type="submit" name = "termine" class="btn btn-primary btn-block">Terminer</button>
                    
                    <hr style = "color: black;">
                    
                    <p class="pull-left"><a href="Connexion.php" style="text-decoration: none; font-weight: 50px; color: black"> Revenir en arriere</a></p>
                </form> 
            </div> 
    
            <hr style = "opacity : 0.2;">
                <h6><center style="color: white;">Copyright &copy; 2019 g-market Inc</center></h6>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
</body>
</html>