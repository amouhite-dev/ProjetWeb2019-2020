<?php
	require_once("../auth/EtreAuthentifie.php");
	if($idm->getRole()=='acheteur'){
	include("headerAcheteur.php");
	?>
	<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none; color: black;">
          Commande refusée
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <?php
	require("../db_config.php");
	$u = $idm->getUid();
	try {
		$db = new PDO($dsn, $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
$sql = "SELECT DISTINCT users.login as l, produits.nom as p, produits.prix as prix, commande.qte as q, commande.date as d FROM commande INNER JOIN produits INNER JOIN users WHERE 
		(commande.pid = produits.pid AND commande.uid = $u ) AND (users.role = 'vendeur' AND commande.statut = 'refusee') AND (produits.uid = users.uid AND produits.pid = commande.pid)";


		$st = $db->prepare($sql);
		$res =$st->execute();

		if ($st->rowCount()==0){
		echo "<center><img src = \"../images/pagevide.jpeg\" alt=\"page vide\" ></center>";
		}else {
?>
	        <div class="row row-cols-1 row-cols-md-3">
			    <?php
			    foreach($st as $row) {
			    ?>
				    <div class="card mb-3" style="max-width: 540px; margin-top: 10px;">
						<div class="row no-gutters">
		    				<div class="col-md-4">
		    					<img src="../images/photo.jpg" class="card-img" alt="article">
		    				</div>
			   				<div class="col-md-8">
			   					<div class="card-body">
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
					   				<p class="card-text">
					   					Vendeur : <?php echo htmlspecialchars($row["l"])?>
					   				</p>
			   						
			   					</div>
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

?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="text-decoration: none; color: black;">
          Commande acceptée
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <?php
	require("../db_config.php");
	$u = $idm->getUid();
	try {
		$db = new PDO($dsn, $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
$sql = "SELECT DISTINCT users.login as l, produits.nom as p, produits.prix as prix, commande.qte as q, commande.date as d FROM commande INNER JOIN produits INNER JOIN users WHERE 
		(commande.pid = produits.pid AND commande.uid = $u ) AND (users.role = 'vendeur' AND commande.statut = 'acceptee') AND (produits.uid = users.uid AND produits.pid = commande.pid)";


		$st = $db->prepare($sql);
		$res =$st->execute();

		if ($st->rowCount()==0){
		echo "<center><img src = \"../images/pagevide.jpeg\" alt=\"pages vide\" ></center>";
		}else {
?>
	        <div class="row row-cols-1 row-cols-md-3">
			    <?php
			    foreach($st as $row) {
			    ?>
				    <div class="card mb-3" style="max-width: 540px;">
						<div class="row no-gutters">
		    				<div class="col-md-4">
		    					<img src="../images/photo.jpg" class="card-img" alt="article">
		    				</div>
			   				<div class="col-md-8">
			   					<div class="card-body">
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
					   				<p class="card-text">
					   					Vendeur : <?php echo htmlspecialchars($row["l"])?>
					   				</p>
			   						
			   					</div>
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

?>
      </div>
    </div>
  </div>
  <?php
  	include("../footer.php");
  	} else {
		include("../Identification/ErreurConnexion.php");
	}
  	?>
  
	
</div>
 
	









					




