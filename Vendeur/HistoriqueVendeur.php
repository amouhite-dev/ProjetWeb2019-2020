 <?php
	require_once("../auth/EtreAuthentifie.php");
	  if($idm->getRole() == 'vendeur'){
	include("headerVendeur.php");
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
		$sql = "SELECT DISTINCT commande.pid as pid,produits.nom as p,commande.qte as q,commande.date as d,commande.statut as s FROM commande INNER JOIN produits INNER JOIN users WHERE 
		(commande.pid = produits.pid AND commande.statut = 'refusee') AND (users.role = 'vendeur' AND produits.uid = $u)";

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
				    <div class="col mb-4">
				        <div class="card">
				            <img src="../images/photo.jpg" class="card-img-top" alt="photo indisponible">
				            <div class="card-body">
					            <h5 class="card-title">Nom du Produit : <?php echo htmlspecialchars($row["p"])?></h5>
					            <p class="card-text">Quantité <?php echo htmlspecialchars($row["q"])?></p>
					            <h6 class="card-text">Date de commande : <?php echo htmlspecialchars($row["d"])?></h6>     
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
		$sql = "SELECT DISTINCT commande.pid as pid,produits.nom as p,commande.qte as q,commande.date as d,commande.statut as s FROM commande INNER JOIN produits INNER JOIN users WHERE 
		(commande.pid = produits.pid AND commande.statut = 'acceptee') AND (users.role = 'vendeur' AND produits.uid = $u)";

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
				    <div class="col mb-4">
				        <div class="card">
				            <img src="../images/photo.jpg" class="card-img-top" alt="photo indisponible">
				            <div class="card-body">
					            <h5 class="card-title">Nom du Produit : <?php echo htmlspecialchars($row["p"])?></h5>
					            <p class="card-text">Quantité <?php echo htmlspecialchars($row["q"])?></p>
					            <h6 class="card-text">Date de commande : <?php echo htmlspecialchars($row["d"])?></h6>     
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


 