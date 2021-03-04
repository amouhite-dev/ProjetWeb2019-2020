<!DOCTYPE html> 
    <html>
        <head>
            <meta charset="utf-8"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel = stylesheet type="text/css" href="PageConnexion.css">
            <title>Inscription</title>
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          

            <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        </head>

        <body>
          
            <a href = "../index.php" class = "titre"><h1 class = "titre">G-MARKET</h1></a>
            <hr style = "opacity : 0.2;">
            <div class="container">
                <form class="form-horizontal" role="form" method="post" action = "Inscription.php">
                    <h2>Inscription</h2>
                    <?php
                        if (isset($_POST['inscrire'])) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> <?php echo "Erreur"; ?>!</strong> 
                            <?php echo $error ?>
                        </div>
                    <?php
                        }
                    ?>
                    <div class="form-group">
                        <label for="firstName" class="col-sm-3 control-label">Nom</label>
                        <div class="col-sm-9">
                            <input type="text" name="nom"  id="Inputnom" placeholder="Nom ..." class="form-control" required value="<?= $data['nom']??""?>" value="<?php echo htmlspecialchars($nom);?>" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="col-sm-3 control-label">Prenom</label>
                        <div class="col-sm-9">
                            <input type="text" name="prenom"  id="Inputprenom" placeholder="Prenom ..." class="form-control" required aria-required="true" value="<?= $data['prenom']??""?>" value="<?php echo htmlspecialchars($prenom);?>" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="login" class="col-sm-3 control-label">Identifiant</label>
                        <div class="col-sm-9">
                            <input type="text" name="login"  id="Inputlogin" placeholder="Identifiant ..." class="form-control" required value="<?= $data['login']??""?>" value="<?php echo htmlspecialchars($login);?>" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mdp1" class="col-sm-3 control-label">Mot de passe</label>
                        <div class="col-sm-9">
                            <input type="password" name="mdp1" id="Inputmdp1" placeholder="Mot de passe ..." class="form-control" required value="<?= $data['mdp1']??""?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mdp2" class="col-sm-3 control-label">Comfirmer mot de passe</label>
                        <div class="col-sm-9">
                            <input type="password" name="mdp2" id="Inputmdp2" placeholder="Mot de passe ..." class="form-control"required value="<?= $data['mdp2']??""?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-sm-3 control-label">Rôle</label>
                        <div class="col-sm-9">
                            <select class="col-sm-9 input-field" id="role" name="role" placeholder="Rôle" width = "auto*" required value="<?= $data['role']??""?>">
                                <option value="Acheteur">Acheteur</option>
								<option value="Vendeur">Vendeur</option>
                            </select>
                        </div>
                    </div> 
                    <button type="submit" name="inscrire" class="btn btn-primary btn-block">S'enregistrer</button>
                    <hr style = "color: black;">
                    <p class="pull-left"><a href="Connexion.php" style="text-decoration: none; font-weight: 50px; color: black;">Déjà inscris ?</a></p>
                    <p class="pull-right" style="text-decoration: none; font-weight: 50px; color: black" onclick="history.go(-1)"><a> Retour </a></p>
                </form> 
            </div> 
            <hr style = "opacity : 0.2;">
            <h6><center style="color: black;">Copyright &copy; 2019 g-market Inc</center></h6>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
        </body>
    </html>
    