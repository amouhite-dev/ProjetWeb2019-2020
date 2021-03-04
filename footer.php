<?php 
require_once("auth/EtreAuthentifie.php");
  $pourtoi = "";
  $fin = '';
  if ($idm->getRole() == 'vendeur'){
      $pourtoi = 'listeCmdVendeur.php';
      $fin = 'AccueilVendeur.php';
      $profil = 'MonProfilVendeur.php';
  } else if ($idm->getRole() == 'acheteur') {
      $pourtoi = 'listeCmdAcheteur.php';
      $fin = 'AccueilAcheteur.php';
      $profil = 'MonProfilAcheteur.php';
  } else {
      $fin = 'Identification/ErreurConnexion.php';
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
            <?php if ($idm->getRole() == 'acheteur'){ ?>
            <p style="padding-bottom: 20px;">
              <a href="AccueilAcheteur.php" class="liens">Se fait plaisir</a>
            </p><?php } else { ?>
            <p style="padding-bottom: 20px;">
              <a href="AjoutProduit.php" class="liens">Se faire de l'argent</a>
            </p><?php } ?>
          </div>
              
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase font-weight-bold">
              POUR TOI
            </h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
              <a href="<?php echo $profil; ?>" class="liens">Mon Compte</a>
            </p>
            <p style="padding-bottom: 20px;">
              <a href="<?php echo $pourtoi; ?>" class="liens">Suivre mes commandes</a>
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
        <a href="<?php echo $fin; ?>"> g-market.com</a>
      </div>
    </footer>
  </body>
</html>











