 <!DOCTYPE html> 
    <html>
        <head>
            <meta charset="utf-8"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel = stylesheet type="text/css" href="../Identification/PageConnexion.css">
            <title>Modifier un produit</title>
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        </head>

        <body class="modifie">
          
            <a href = "AccueilVendeur.php" class="titre"><h1 class="titre">G-MARKET</h1></a>
            <hr style = "opacity : 0.2;">
            <div class="container">
            	
                <form class="form-horizontal" role="form" method="post" action = "ModifieProduit.php?pid=<?php echo $_GET['pid'];?>">
                    <h2>Modifier un produit</h2>
                    <?php
                        if (isset($_POST['modifie'])) {
                    ?>
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> <?php echo $resultat1; ?>!</strong> 
                            <?php echo $resultat; ?>
                        </div>
                    <?php
                        }
                    ?>
                    
                    <div class="form-group">
                        <div class="col-sm-9">
                            <input type = "hidden" name="pid" class="form-control" value="<?php echo $pid;?>">
                        </div>
                    </div>
               
                    <div class="form-group">
                        <label for="nom" class="col-sm-3 control-label">Nom </label>
                        <div class="col-sm-9">
                            <input type="text" name="nom" class="form-control" value="<?php echo htmlspecialchars($nom);?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Description </label>
                        <div class="col-sm-9">
                            <input type="text" name="description" class="form-control" value="<?php echo htmlspecialchars($description);?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="prix" class="col-sm-3 control-label">Prix </label>
                        <div class="col-sm-9">
                            <input type="decimal" name="prix" min="1" class="form-control" value="<?php echo $prix;?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="uid" class="col-sm-3 control-label">N° matricule </label>
                        <div class="col-sm-9">
                            <input type="number" name="uid" class="form-control" value="<?php echo $uid;?>" disabled="disabled">
                            <input type="hidden" name="uid" class="form-control" value="<?php echo $uid;?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="qte" class="col-sm-3 control-label">Quantité </label>
                        <div class="col-sm-9">
                            <input type="number" name="qte" min="1" class="form-control" value="<?php echo $qte;?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="ctid" class="col-sm-3 control-label">Categorie </label>
                        <div class="col-sm-9">
                            <select class="col-sm-9 input-field" name="ctid" width = "auto" value="<?php echo $ctid?>">
                                <option value="1">Alimentaire</option>
								<option value="3">Jouet</option>
								<option value="2">Vêtement</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" name="modifie">Modifier</button>
                    
                    <hr style = "color: black;">
                    
                    <p class="pull-left"><a href="AccueilVendeur.php" style="text-decoration: none; font-weight: 50px; color: black"> Revenir à l'Accueil ?</a></p>
                    <p class="pull-right"><a style="text-decoration: none; font-weight: 50px; color: black" onclick="history.go(-1)"> Retour </a></p>
                </form> 
            </div> 
    
            <hr style = "opacity : 0.2;">
            </div>
                <h6><center style="color: white;">Copyright &copy; 2019 g-market Inc</center></h6>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
        </body>
    </html>
