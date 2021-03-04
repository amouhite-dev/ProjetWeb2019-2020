<?php
  require_once("../auth/EtreAuthentifie.php");
  
    $page_title = "Suppression";

    if (!isset($_POST["pid"])) {
      include 'AccueilAcheteur.php';
    } else {
      $pid = $_POST['pid'];
  	  require "../db_config.php";
      try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $SQL = "DELETE FROM commande WHERE pid = ? AND statut = 'en_cours'";

        $st = $db->prepare($SQL);
        $st->execute(array($pid));
        echo "<meta http-equiv=\"refresh\" content=\"0;'listeCmdAcheteur.php'\"/>";
      } catch (PDOException $e){
        echo "Erreur SQL: ".$e->getMessage();
      }
    }
?>
