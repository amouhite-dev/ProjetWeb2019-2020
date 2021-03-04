<?php
	require_once('../auth/EtreAuthentifie.php');
	require("../db_config.php");

	$user = $idm->getRole();
	$id = $idm->getUid();


	if(empty($_GET['s'])){
		include("AccueilVendeur.php");
	} else {

		$db = new PDO($dsn, $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if ($user == "vendeur"){
			$sql = 'SELECT nom FROM produits ORDER BY pid ASC';
			$produits = $db->prepare($sql);
			$produits->execute();
			
			$sql1 = 'SELECT nom FROM categories ORDER BY ctid ASC';
			$categories = $db->prepare($sql1);
			$categories->execute();

			if (isset($_GET['s']) AND !empty($_GET['s'])) {
			    $s = htmlspecialchars($_GET['s']);

				$sql = 'SELECT pid,nom,description,prix, ctid, uid FROM produits WHERE nom LIKE "%'.$s.'%" ORDER BY pid ASC';
				$produits = $db->prepare($sql);
				$produits->execute();
		
			    $sql1 = 'SELECT nom FROM categories WHERE nom LIKE "%'.$s.'%" ORDER BY ctid ASC';
			    $categories = $db->prepare($sql1);
			    $categories->execute();

			    if ($produits->rowCount() == 0) {
			    	$sql = 'SELECT pid,nom,description,prix,ctid,uid FROM produits WHERE CONCAT(nom, description) LIKE "%'.$s.'%" ORDER BY pid DESC';
			      	$produits = $db->prepare($sql);
			      	$produits->execute();
			    }
			}

			if ($produits->rowCount() > 0) { 
				include("headerVendeur.php");
			   	while($prod = $produits->fetch()) { 
			   		if($prod['uid'] == $id){
				   		if ($prod['ctid'] == "1"){
							// include("listeAlimentVendeur.php");	
	?>
							<div class="col mb-4" style="height: 30%; width: 30%;">
					            <div class="card">
					              	<img src="../images/alimentsPhoto.jpg" class="card-img-top" alt="photo aliment" width="20%">
					                <div class="card-body">
						                <h5 class="card-title"><?php echo htmlspecialchars($prod["nom"])?></h5>
						                <p class="card-text"><?php echo htmlspecialchars($prod["description"])?></p>
						                <h6 class="card-text" style = "color:red;" ><?php echo htmlspecialchars($prod["prix"])?>€</h6>
						                <p>
						                  <?php echo '<a href="SupprimeProduit.php?pid='.$prod['pid']. '" onclick="return confirm(\'Etes vous sûr ?\')"><button type = "button" class="btn btn-primary register">'.'Supprimer'.'</button></a>';?>
						                  <a href="<?php echo "ModifieProduit.php?pid=" . $prod['pid'];?>">
						                    <button type = "button" class="btn btn-primary register" style="float: right;">Modifier</button>
						                  </a>
						                </p>
					              	</div>
					            </div>
				            </div>
	<?php
		          
						} else if ($prod['ctid'] == "3"){
							// include("listeJouetVendeur.php");
	?>
							<div class="col mb-4" style="height: 30%; width: 30%;">
					            <div class="card">
					              	<img src="../images/jouetPhoto.png" class="card-img-top" alt="photo aliment" width="20%">
					              	<div class="card-body">
					                	<h5 class="card-title"><?php echo htmlspecialchars($prod["nom"])?></h5>
					                	<p class="card-text"><?php echo htmlspecialchars($prod["description"])?></p>
					                	<h6 class="card-text" style = "color:red;" ><?php echo htmlspecialchars($prod["prix"])?>€</h6>
					                	<p>
						                  <?php echo '<a href="SupprimeProduit.php?pid='.$prod['pid']. '" onclick="return confirm(\'Etes vous sûr ?\')"><button type = "button" class="btn btn-primary register">'.'Supprimer'.'</button></a>';?>
						                  <a href="<?php echo "ModifieProduit.php?pid=" . $prod['pid'];?>">
						                    <button type = "button" class="btn btn-primary register" style="float: right;">Modifier</button>
						                  </a>
					                	</p>
					              	</div>
					            </div>
				            </div>
	<?php
						} else if ($prod['ctid'] == "2") {
							// include("listeVetementVendeur.php");
	?>
							<div class="col mb-4" style="height: 30%; width: 30%;">
					            <div class="card">
					              	<img src="../images/vetementPhoto.jpg" class="card-img-top" alt="photo aliment" width="20%">
					              	<div class="card-body">
						                <h5 class="card-title"><?php echo htmlspecialchars($prod["nom"])?></h5>
						                <p class="card-text"><?php echo htmlspecialchars($prod["description"])?></p>
						                <h6 class="card-text" style = "color:red;" ><?php echo htmlspecialchars($prod["prix"])?>€</h6>
						                <p>
						                  <?php echo '<a href="SupprimeProduit.php?pid='.$prod['pid']. '" onclick="return confirm(\'Etes vous sûr ?\')"><button type = "button" class="btn btn-primary register">'.'Supprimer'.'</button></a>';?>
						                  <a href="<?php echo "ModifieProduit.php?pid=" . $prod['pid'];?>">
						                    <button type = "button" class="btn btn-primary register" style="float: right;">Modifier</button>
						                  </a>
					                	</p>
					              	</div>
					            </div>
				            </div>
	<?php
						} else {
							echo "<center><img src = \"../images/pagevide.jpeg\" alt=\"page vide\" ></center>";
						}
					}
				}
				include ('../footer.php');
			} else if ($categories->rowCount() > 0){
				while($cat = $categories->fetch()) {
					if ($cat['nom'] == "Alimentaire"){
						include("listeAlimentVendeur.php");
					} else if ($cat['nom'] == "Jouets"){
						include("listeJouetVendeur.php");
					} else if ($cat['nom'] == "Vêtements") {
						include("listeVetementVendeur.php");
					} else {
						echo "<center><img src = \"../images/pagevide.jpeg\" alt=\"page vide\" ></center>";
					}
			   		$info = $cat['nom'];
				}
			} else {
				include 'headerVendeur.php';
				echo "<center><img src = \"../images/pagevide.jpeg\" alt=\"page vide\" ></center>";
				include '../footer.php';
			}
		}
	}
?> 










