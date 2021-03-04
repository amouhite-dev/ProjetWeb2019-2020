<?php
	require_once("../auth/EtreAuthentifie.php");
	if($idm->getRole()=='acheteur'){
		include("headerAcheteur.php");
		require("../db_config.php");

		try {
			$db = new PDO($dsn, $username, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql =" SELECT  produits.nom as n ,description,users.uid as u,qte,prix,login,pid FROM produits INNER JOIN users WHERE ctid = 2 AND produits.uid = users.uid";

			$res = $db->prepare($sql);
			$res->execute();
			
			if ($res->rowCount()==0){
			    echo "<center><img src = \"../images/pagevide.jpeg\" alt=\"page vide\" ></center>";
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
						<div class="col mb-4">
						    <div class="card">
						        <img src="../images/vetementPhoto.jpg" class="card-img-top" alt="photo indisponible">
						        <div class="card-body">
						        	
						            <h5 class="card-title"><?php echo htmlspecialchars($row["n"])?></h5>
						            <p class="card-text"><?php echo htmlspecialchars($row["description"])?></p>
						            <p class="card-text"><?php echo htmlspecialchars($row["login"])?></p>
						            <h6 class="card-text" style="color: red;"><?php echo htmlspecialchars($row["prix"])?>€</h6>
						            <p>
						                <form method="POST" action="CommandeAcheteur.php">
						                	<input type="number" min="1" name="qte" required value="<?= $data['qte']??""?>">
						                	<input type="hidden" name="uid" value="<?php echo $row["u"]?>">
											<input type="hidden" name="nom" value="<?php echo $row["n"]?>">
											<input type="hidden" name="prix" value="<?php echo $row["prix"]?>">
											<input type="hidden" name="pid" value="<?php echo $row["pid"]?>">
											<button type="submit" name="acheter" class="btn btn-primary register">Acheter</button>
										</form>   
						            </p>
						        </div>
						    </div>
					    </div>
				<?php
					};
				?>
				</div>
			<?php
				$db=null;
			}
		} catch (PDOException $e){
			echo "Erreur SQL: ".$e->getMessage();
		}
		include("../footer.php");
	} else if($idm->getRole()=='vendeur') {
		include ('../listeVetementVendeur.php');
	} else {
		include('../Identification/ErreurConnexion.php');
	}
?>

