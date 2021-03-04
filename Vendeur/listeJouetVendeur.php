<?php
  require_once("../auth/EtreAuthentifie.php");
    if($idm->getRole() == 'vendeur'){
  include("headerVendeur.php");
  require("../db_config.php");

  try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT pid,nom,description,prix FROM produits WHERE ctid = 3 AND uid = ".$idm->getUid()."";
    
    $st = $db->prepare($sql);
    $res = $st->execute();
    
    if ($st->rowCount()==0){
      echo "<center><img src = \"../images/pagevide.jpeg\" alt=\"page vide\" ></center>";
    } else{
    ?>
      <div class="row row-cols-1 row-cols-md-3">
        <?php
        foreach($st as $row) {
        ?>
          <div class="col mb-4">
            <div class="card">
              <img src="../images/jouetPhoto.png" class="card-img-top" alt="photo indisponible">
              <div class="card-body"> 
                <h5 class="card-title"><?php echo htmlspecialchars($row["nom"])?></h5>
                <p class="card-text"><?php echo htmlspecialchars($row["description"])?></p>
                <h6 class="card-text" style="color: red;"><?php echo htmlspecialchars($row["prix"])?>€</h6>
                <p>
                  <?php echo '<a href="SupprimeProduit.php?pid='.$row['pid']. '" onclick="return confirm(\'Etes vous sûr ?\')"><button type = "button" class="btn btn-primary register">'.'Supprimer'.'</button></a>';
                  ?>
                  <a href="<?php echo "ModifieProduit.php?pid=" . $row['pid'];?>">
                    <button type = "button" class="btn btn-primary register" style="float: right;">Modifier</button>
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