<?php
	require_once('../auth/EtreAuthentifie.php');
	require("../db_config.php");

	$user = $idm->getRole();
	$id = $idm->getUid();

	if(empty($_GET['s'])){
		include("AccueilAcheteur.php");
	}else{

		$db = new PDO($dsn, $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if ($user == "acheteur"){
			$sql = 'SELECT nom FROM produits ORDER BY pid ASC';
			$produits = $db->prepare($sql);
			$produits->execute();
			
			$sql1 = 'SELECT nom FROM categories ORDER BY ctid ASC';
			$categories = $db->prepare($sql1);
			$categories->execute();

			$sql2 = 'SELECT login FROM users WHERE role = "vendeur" ORDER BY uid ASC';
			$categories = $db->prepare($sql2);
			$categories->execute();

			if (isset($_GET['s']) AND !empty($_GET['s'])) {
			    $s = htmlspecialchars($_GET['s']);

				$sql = 'SELECT nom,description,qte,prix,pid,ctid,uid FROM produits WHERE nom LIKE "%'.$s.'%" ORDER BY pid ASC';
				$produits = $db->prepare($sql);
				$produits->execute();
		
			    $sql1 = 'SELECT nom FROM categories WHERE nom LIKE "%'.$s.'%" ORDER BY ctid ASC';
			    $categories = $db->prepare($sql1);
			    $categories->execute();

			    $sql2 = 'SELECT login, uid FROM users WHERE role = "vendeur" AND login LIKE "%'.$s.'%" ORDER BY uid ASC';
			    $vendeur = $db->prepare($sql2);
			    $vendeur->execute();

			    if ($produits->rowCount() == 0) {
			        $sql = 'SELECT nom,description,prix,pid,ctid FROM produits WHERE CONCAT(nom, description) LIKE "%'.$s.'%" ORDER BY pid DESC';
			      	$produits = $db->prepare($sql);
			      	$produits->execute();
			    }
			}

			if ($produits->rowCount() > 0) { 
				include 'headerAcheteur.php';
			   	while($prod = $produits->fetch()){
				   		if ($prod['ctid'] == "1"){
							?>
							<div class="col mb-4" style="height: 30%; width: 30%;">
							    <div class="card">
							        <img src="../images/alimentsPhoto.jpg" class="card-img-top" alt="photo indisponible" width="20%">
							        <div class="card-body">
							            <h5 class="card-title"><?php echo htmlspecialchars($prod["nom"])?></h5>
							            <p class="card-text"><?php echo htmlspecialchars($prod["description"])?></p>
							            <h6 class="card-text" style = "color:red;" ><?php echo htmlspecialchars($prod["prix"])?>€</h6>
							            <p>
							                <form method="POST" action="CommandeAcheteur.php">
							                	<input type="number" min="1" name="qte" required value="<?= $data['qte']??""?>">
							                	<input type="hidden" name="uid" value="<?php echo $prod["uid"]?>">
												<input type="hidden" name="nom" value="<?php echo $prod["nom"]?>">
												<input type="hidden" name="prix" value="<?php echo $prod["prix"]?>">
												<input type="hidden" name="pid" value="<?php echo $prod["pid"]?>">
												<button type="submit" name="acheter" class="btn btn-primary register">Acheter</button>
											</form>   
							            </p>
							        </div>
							    </div>
						    </div>
						    <?php
						} else if ($prod['ctid'] == "3"){
							?>
							<div class="col mb-4" style="height: 30%; width: 30%;">
							    <div class="card">
							        <img src="../images/jouetPhoto.png" class="card-img-top" alt="photo indisponible" width="20%">
							        <div class="card-body">
							        	
							            <h5 class="card-title"><?php echo htmlspecialchars($prod["nom"])?></h5>
							            <p class="card-text"><?php echo htmlspecialchars($prod["description"])?></p>
							            <h6 class="card-text" style = "color:red;" ><?php echo htmlspecialchars($prod["prix"])?>€</h6>
							            <p>
							                <form method="POST" action="CommandeAcheteur.php">
							                	<input type="number" min="1" name="qte" required value="<?= $data['qte']??""?>">
							                	<input type="hidden" name="uid" value="<?php echo $prod["uid"]?>">
												<input type="hidden" name="nom" value="<?php echo $prod["nom"]?>">
												<input type="hidden" name="prix" value="<?php echo $prod["prix"]?>">
												<input type="hidden" name="pid" value="<?php echo $prod["pid"]?>">
												<button type="submit" name="acheter" class="btn btn-primary register">Acheter</button>
											</form>   
							            </p>
							        </div>
							    </div>
						    </div>
						    <?php
						} else if ($prod['ctid'] == "2") {
							?>
							<div class="col mb-4" style="height: 30%; width: 30%;">
							    <div class="card">
							        <img src="../images/vetementPhoto.jpg" class="card-img-top" alt="photo indisponible" width="20%">
							        <div class="card-body">
							        	
							            <h5 class="card-title"><?php echo htmlspecialchars($prod["nom"])?></h5>
							            <p class="card-text"><?php echo htmlspecialchars($prod["description"])?></p>
							            <h6 class="card-text" style = "color:red;" ><?php echo htmlspecialchars($prod["prix"])?>€</h6>
							            <p>
							                <form method="POST" action="CommandeAcheteur.php">
							                	<input type="number" min="1" name="qte" required value="<?= $data['qte']??""?>">
							                	<input type="hidden" name="uid" value="<?php echo $prod["uid"]?>">
												<input type="hidden" name="nom" value="<?php echo $prod["nom"]?>">
												<input type="hidden" name="prix" value="<?php echo $prod["prix"]?>">
												<input type="hidden" name="pid" value="<?php echo $prod["pid"]?>">
												<button type="submit" name="acheter" class="btn btn-primary register">Acheter</button>
											</form>   
							            </p>
							        </div>
							    </div>
						    </div>
						    <?php
						} else {
							echo "<center><img src = \"../images/pagevide.jpeg\" alt=\"page vide\" ></center>";
						}
					}
				include ('../footer.php');
			} else if ($categories->rowCount() > 0){
				while($cat = $categories->fetch()) {
					if ($cat['nom'] == "Alimentaire"){
						include("listeAlimentAcheteur.php");
					} else if ($cat['nom'] == "Jouets"){
						include("listeJouetAcheteur.php");
					} else {
						include("listeVetementAcheteur.php");
					}
				}
			} else if ($vendeur->rowCount() > 0) {
				include("headerAcheteur.php");
				while($sell = $vendeur->fetch()) { 
	?>
					<div class="col mb-4" style="height: 30%; width: 30%;">
						<div class="card">
						    <img src="../images/profile.jpg" class="card-img-top" alt="photo indisponible" width="20%">
					        <div class="card-body">
					       	    <h5 class="card-title"><?php echo htmlspecialchars($sell["login"])?></h5>
					           	<p>
					           		<a href ="listeProdVendeur.php?id=<?=$sell["uid"];?>">
					     	  			<button class="btn btn-primary register">Voir ces produits</button>
					           		</a>   
					           	</p>
					        </div>
					    </div>
					</div>
<?php
				}
				include("../footer.php");
			} else {
				include ('headerAcheteur.php');
				echo "<center><img src = \"../images/pagevide.jpeg\" alt=\"page vide\" ></center>";
				include ('../footer.php');
			}
		}
	}
?>










