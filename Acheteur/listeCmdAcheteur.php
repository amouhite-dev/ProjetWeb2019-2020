 <?php
	require_once("../auth/EtreAuthentifie.php");
	if($idm->getRole() == 'acheteur'){
		include("headerAcheteur.php");
		require("../db_config.php");
		$count = 0;
		$log = $idm->getUid();
		try {
			$db = new PDO($dsn, $username, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "SELECT DISTINCT produits.pid as pid, users.login as l, produits.nom as p, produits.prix as prix, commande.qte as q, commande.date as d, commande.statut as s FROM commande INNER JOIN produits INNER JOIN users WHERE (commande.pid = produits.pid AND commande.uid = users.uid )AND(commande.uid = $log) AND commande.statut = 'en_cours'";

			$res = $db->prepare($sql);
			$res->execute();
			
			if ($res->rowCount()==0){
			    echo "<center><img src = \"../images/pagevide.jpeg\" alt=\"page vide\"></center>";
			    ?>
		<center>
				<p style="background-color: #c1ccd6; width: 50%;">
					Total : <strong style="color: red;"><?php echo $count . '€'; ?></strong> 
				</p>
				<a href="HistoriqueAcheteur.php"><button type = "button" class="btn btn-primary register" style="width: 100%;">
					Voir mon historiques 
				</button></a>
			</center>
		<?php
			} else{
			?>
				<?php
	                if (isset($_POST['qte']) || isset($_POST['acheter'])) {
	            ?>
				        <div class="alert alert-info alert-dismissible">
				            <button type="button" class="close" data-dismiss="alert">&times;</button>
			                <strong> <?php echo $resultat; ?>!</strong>
	                    </div>
	            <?php
	                }
	            ?>

		    	<div class="row row-cols-1 row-cols-md-3">
	            <?php
			        foreach($res as $row) {

			    ?>
						<div class="card mb-3" style="max-width: 540px; margin-top: 10px;">
							<div class="row no-gutters">
			    				<div class="col-md-4">
			    					<img src="../images/photo.jpg" class="card-img" alt="article">
			    				</div>
				   				<div class="col-md-8">
				   					<div class="card-body">
				   						<form method="post" action="supprimerProduitPanier.php">
				   							<input type="hidden" name="pid" value="<?php echo $row['pid']?>">
				   							<button type="submit" class="close">X</button>
				   						</form>
				   						<p class="card-text">
				   							Prix : <?php 
				   										$res = $row['prix']*$row['q']; 
				   										echo"<span style=\"color: red;\">"
				   												. htmlspecialchars($res) . "€
				   											</span>";
				   									?>
				   						</p>
				   						<h6 class="card-title">
				   							Nom du produit : <?php echo htmlspecialchars($row["p"])?>
				   						</h6>
						   				<p class="card-text">
						   					Quantité : <?php echo htmlspecialchars($row["q"])?>
						   				</p>
						   				<p class="card-text">
						   					Date de depôt : <?php echo htmlspecialchars($row["d"])?>
						   				</p>
				   					</div>
				   		 		</div>
			  				</div>
						</div>
				<?php
						$count = $count + $res;
					};
				?>
				</div>
				<center>
				<p style="background-color: #c1ccd6; width: 50%;">
					Total : <strong style="color: red;"><?php echo $count . '€'; ?></strong> 
				</p>
				<a href="HistoriqueAcheteur.php"><button type = "button" class="btn btn-primary register" style="width: 100%;">
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
		include('../Identification/ErreurConnexion.php');
	}
?>

