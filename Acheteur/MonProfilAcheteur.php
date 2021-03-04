<?php
  require_once("../auth/EtreAuthentifie.php");

  // $title = 'Accueil';
  $role=$idm->getRole();

  include ('MonProfilFormAcheteur.php');
  include( "../db_config.php");
  
  try{
    $_SESSION['login'] = $idm->getIdentity();
    $_SESSION['role'] = $idm->getRole();
    $_SESSION['uid'] = $idm->getUid();

    if (isset($_GET["refresh"]) && $_GET["refresh"] == 1) {
      echo "<meta http-equiv=\"refresh\" content=\"0;'MonProfilAcheteur.php'\"/>";
      $_GET["refresh"] = 2;
    } 
  } catch(PDOException $e){
    print "Erreur de connexion: ". $e->getMessage() . '<br/>' ;
    die();
  }
?>
