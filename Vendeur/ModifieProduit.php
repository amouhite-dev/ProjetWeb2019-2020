<?php
require_once("../auth/EtreAuthentifie.php");
if ($idm->getRole()=="vendeur"){
	
	$page_title="Modifier un produit";
	$resultat1 = "";
	$resultat = "";
	$resultat2="";

	if (!isset($_GET["pid"])) {
		include ("ModifieProduitForm.php");
	}else {
		$pid = $_GET["pid"];
		require("../db_config.php");

		try {
			$db = new PDO($dsn, $username, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$SQL = "SELECT * FROM produits WHERE pid=:pid";

			$st = $db->prepare($SQL);
			$st->execute(array("pid"=>"$pid"));

			foreach ($st as $row) {
				$nom = $row["nom"];
				$description = $row["description"];
				$prix = $row["prix"];
				$qte = $row["qte"];
				$ctid = $row["ctid"];
				$uid = $row["uid"];
			}

			if ($st->rowCount() ==0) {
				echo "<center><img src = \"pagevide.jpeg\" alt=\"page vide\" ></center>";
			} else if (!isset($_POST["nom"]) || !isset($_POST["description"]) || !isset($_POST["prix"]) || !isset($_POST["qte"]) || !isset($_POST["ctid"])|| !isset($_POST["uid"])){
				include("ModifieProduitForm.php");
			} else {
				$nom = $_POST["nom"];
				$description = $_POST["description"];
				$prix = $_POST["prix"];
				$qte = $_POST["qte"];
				$ctid = $_POST["ctid"];
				$uid = $_POST["uid"];
				if ($nom=="" || $description=="" || !is_numeric($prix) || !$prix>0 || !is_numeric($qte) || !$qte>0 || !is_numeric($ctid) || !$ctid>0 || !is_numeric($uid) ) {
					include("ModifieProduitForm.php");
				}else{
					$SQL = "UPDATE produits SET nom=?, description=?, prix=?, qte=?, ctid=? , uid=? WHERE pid=? ";

					$st = $db->prepare($SQL);
					$res = $st->execute(array($nom, $description, $prix, $qte, $ctid, $uid, $pid));
					
					if (!$res) {
						$resultat1 = "Echec";
						$resultat = "La modification du produit a échoué";
						include ('ModifieProduitForm.php');
					} else{
						$resultat1 = "Succès";
						$resultat = "La modification du produit est réussi. ";
						include ('ModifieProduitForm.php');
					}
				}
			}
			$db=null;
		}catch (PDOException $e){
		echo "Erreur SQL: ".$e->getMessage();
		}
	}
	} else {
		include("../Identification/ErreurConnexion.php");
	}
?>


