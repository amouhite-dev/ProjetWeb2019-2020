<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
                       
            <title>Connexion</title>
            
            <link rel = stylesheet href="PageConnexion.css">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        </head>
        
        <a class = "titre" href = "../index.php"><h1 class = "titre">G-MARKET</h1></a>
        <hr style = "opacity : 0.2;">
        <div class="container">
            <form class="form-horizontal" role="form" method="post" action="Connexion.php">
                <h2>Connexion</h2>
                <?php
                        if (isset($_POST['button'])) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> <?php echo "Erreur"; ?>!</strong> 
                            <?php echo $error; ?>
                        </div>
                    <?php
                        }
                    ?>
                <div class="form-group">
                    <label for="inputLogin" class="col-sm-3 control-label">Identifiant</label>
                    <div class="col-sm-9">
                        <input type="text" name="login" size="20" class="form-control" id="inputLogin" required placeholder="Identifiant ..." required value="<?= $data['login']??"" ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputMDP" class="col-sm-3 control-label">Mot de passe</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" placeholder="Mot de passe ..." size="20" required id="inputMDP" class="form-control" required value="<?= $data['password']??"" ?>">
                    </div>
                </div>
                
                <input type="submit" name = "button" class="btn btn-primary btn-block" value="Se connecter" />
                
                <hr style = "color: black;">
                
                <p class="pull-right"><a href="Inscription.php" style="text-decoration: none; font-weight: 50px; color: black">Première Connexion</a></p>
                <p class="pull-left"><a href="MdpComfirm.php" style="text-decoration: none; font-weight: 50px; color: black">Mot de passe oublié</a></p>
            </form>
        </div>

        <hr style = "opacity : 0.2;">
        
        <h6><center style="color: white;">Copyright &copy; 2019 g-market Inc</center></h6>
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
    </html>
