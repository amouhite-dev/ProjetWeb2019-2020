<?php
	require_once("../auth/EtreAuthentifie.php");
	  if($idm->getRole() == 'vendeur'){

	include("headerVendeur.php");
	require("../db_config.php");
	$u = $idm->getUid();
	$count = 0;
	try {
		$db = new PDO($dsn, $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT DISTINCT commande.cmdid as cmdid,commande.pid as pid,produits.prix as prix,produits.nom as p,commande.qte as q,commande.date as d,commande.statut as s FROM commande INNER JOIN produits INNER JOIN users WHERE (commande.pid = produits.pid AND commande.statut = 'en_cours') AND (users.role = 'acheteur' AND produits.uid = $u)";

		$st = $db->prepare($sql);
		$res =$st->execute();

		if ($st->rowCount()==0){
		echo "<center><img src = \"../images/pagevide.jpeg\" alt=\"page vide\" ></center>";
		?>
		<center>
				<p style="background-color: #c1ccd6; width: 50%;">
					Total : <strong style="color: red;"><?php echo $count . '€'; ?></strong> 
				</p>
				<a href="HistoriqueVendeur.php"><button type = "button" class="btn btn-primary register" style="width: 100%;">
					Voir mon historiques 
				</button></a>
			</center>
		<?php
		}else {
?>
	        <div class="row row-cols-1 row-cols-md-3">
			    <?php
			    foreach($st as $row) {
			    ?>
				    <div class="col mb-4">
				        <div class="card">
				            <img src="../images/photo.jpg" class="card-img-top" alt="photo indisponible">
				            <div class="card-body">
					            <h5 class="card-title">Nom du Produit : <?php echo htmlspecialchars($row["p"])?></h5>
					            <p class="card-text">Quantité : <?php echo htmlspecialchars($row["q"])?></p>
					            <p class="card-text">Prix : <?php echo htmlspecialchars($row['prix'])?></p>            
					            <h6 class="card-text">Date de commande : <?php echo htmlspecialchars($row["d"])?></h6>
					            <form method="POST" action="CommandeVendeur.php">
					            	<input type="hidden" name="pid" value="<?php echo $row["pid"]?>">
					            	<input type="hidden" name="qte" value="<?php echo $row["q"]?>">
					            	<input type="hidden" name="cmdid" value="<?php echo $row["cmdid"]?>">
					            	<button type = "submit" name="refuser" class="btn btn-primary register" style="float: left;">Refuser</button>
						            <button type = "submit" name="accepter" class="btn btn-primary register" style="float: right;">Accepter</button>    
						        </form>        
				            </div>
				        </div>
				    </div>
			<?php
				$count = $count + ($row["q"]*$row['prix']);
			    };
			?>
	        </div>
	        <center>
				<p style="background-color: #c1ccd6; width: 50%;">
					Total : <strong style="color: red;"><?php echo $count . '€'; ?></strong> 
				</p>
				<a href="HistoriqueVendeur.php"><button type = "button" class="btn btn-primary register" style="width: 100%;">
					Voir mon historiques 
				</button></a>
			</center>
<?php
			$db=null;
		}
	} catch (PDOException $e){
		echo "Erreur SQL: ".$e->getMessage();
	}
	include("../footer.php");
	
} else {
    include("../Identification/ErreurConnexion.php");
  }
?>
