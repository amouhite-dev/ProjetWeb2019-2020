<?php
	require_once("../auth/EtreAuthentifie.php");
	if($idm->getRole() == 'vendeur'){
		$pid = $_POST['pid'];
		$qte = $_POST['qte'];
		$cmdid = $_POST['cmdid'];
		if (isset($pid)){
			if (isset($_POST['refuser'])) {
				$SQL = "UPDATE commande SET statut=? WHERE pid=? AND qte=? AND cmdid=?";
				$st = $db->prepare($SQL);
				$q = $st->execute(array('refusee',$pid,$qte,$cmdid));
				include('listeCmdVendeur.php');
			} else{
				$SQL = "UPDATE commande SET statut=? WHERE pid=? AND qte=? AND cmdid=?";
				$st = $db->prepare($SQL);
				$q = $st->execute(array('acceptee',$pid,$qte,$cmdid));
				include('listeCmdVendeur.php');
			} 
		} else {
			include ('../Identification/ErreurConnexion.php');
		}
	}
?>

