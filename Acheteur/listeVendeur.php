<?php
	
	require_once("../auth/EtreAuthentifie.php");
	if($idm->getRole() == 'acheteur'){
	include("headerAcheteur.php");
	require("../db_config.php");

	try {
		$db = new PDO($dsn, $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql =" SELECT DISTINCT users.login as u, users.uid as uid FROM produits,users WHERE
		produits.uid = users.uid";
		
		$res = $db->prepare($sql);
		$res->execute();
		
		if ($res->rowCount()==0){
		    echo "<center><img src = \"../images/pagevide.jpeg\" alt=\"page vide\" ></center>";
		} else{
?>
		    <div class="row row-cols-1 row-cols-md-3">
		    <?php
		        foreach($res as $row) {
		    ?>
					<div class="col mb-4">
					    <div class="card">
					        <img src="../images/profile.jpg" class="card-img-top" alt="photo indisponible">
				    	    <div class="card-body">
				        	    <h5 class="card-title"><?php echo htmlspecialchars($row["u"])?></h5>
				            	<p>
				            		<a href ="listeProdVendeur.php?id=<?=$row["uid"];?>">
				            			<button class="btn btn-primary register">Voir ces produits</button>
				            		</a>   
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
	} else {
    include("../Identification/ErreurConnexion.php");
  }

?>

