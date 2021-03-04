  <?php
	require_once("../auth/EtreAuthentifie.php");
	if($idm->getRole() == 'acheteur'){
		$resultat = "";
		$continue = 0;
		$pid = $_POST['pid'];
		$uid = $idm->getUid();
		$qte = $_POST['qte'];
		if(isset($_POST['acheter'])) {
			if(isset($_POST['qte'])) {
				$verifsql = "SELECT qte FROM produits WHERE pid = ?";
				$quantite = $db->prepare($verifsql);
				$quantite->execute(array($pid));
				foreach($quantite as $row){
					if ($_POST['qte'] > $row['qte']){
						$continue = 1;
						$resultat = "Désolé, nous n'avons pas cette quantité";
						include("listeCmdAcheteur.php");
					} else {
						$row['qte'] = $row['qte']-$_POST['qte'];
						$SQL = "UPDATE produits SET qte=? WHERE pid=?";
						$st = $db->prepare($SQL);
						$q = $st->execute(array($row['qte'],$pid));
					}
				};
			}	

			if ($continue == 0){					
				require("../db_config.php");
				try {
					$db = new PDO($dsn, $username, $password);
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$verif = "SELECT * FROM commande WHERE uid=$uid AND pid=$pid AND statut='en_cours'";
					$s = $db->prepare($verif);
					$v =$s->execute();
					
					if($s->rowCount() <= 0){
						
						$sql = "INSERT INTO commande VALUES (DEFAULT,?,?,?,NOW(),?)";
						$st = $db->prepare($sql);
						$res =$st->execute(array($pid,$uid,$qte,"en_cours"));

						if (!$res){
							$resultat1 = "Echec";
							$resultat = "Votre panier est remplir.";
							include("listeCmdAcheteur.php");
						} else {
							$resultat1 = "Succès";
							$resultat = "Le produit a bien été ajouté dans votre panier.";
							include("listeCmdAcheteur.php");
						}
						
					}else {
						
						foreach ($s as $val) {
							$val['qte']=$val['qte']+$qte;
							$sq = "UPDATE commande SET qte=? WHERE uid=? AND pid=? AND statut=?";
							$t = $db->prepare($sq);
							$r =$t->execute(array($val['qte'],$uid,$pid,"en_cours"));
						};
						$resultat1 = "Succès";
							$resultat = "Le produit a bien été reajouté dans votre panier.";
						include("listeCmdAcheteur.php");
					} 
					
					$db=null;
					
				} catch (PDOException $e){
					echo "Erreur SQL: ".$e->getMessage();
				}
			}
		}
	} else {
		include '../ErreurConnexion.php';
	}
?>

