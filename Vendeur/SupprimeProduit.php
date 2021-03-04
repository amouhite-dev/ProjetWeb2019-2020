<?php
  require_once("../auth/EtreAuthentifie.php");
  
  if ($idm->getRole()=="vendeur"){
    $page_title = "Suppression";

    if (!isset($_GET["pid"])) {
      include 'AccueilVendeur.php';
    } else {
      $pid = $_GET['pid'];
  	  require "../db_config.php";
      try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $SQL = "DELETE FROM produits WHERE pid=?";

        $st = $db->prepare($SQL);
        $st->execute([$pid]);
        echo "<meta http-equiv=\"refresh\" content=\"0;'AccueilVendeur.php'\"/>";
      } catch (PDOException $e){
        echo "Erreur SQL: ".$e->getMessage();
      }
    }
  } else{ 
    include('../Identification/ErreurConnexion.php'); 
  }
?>
