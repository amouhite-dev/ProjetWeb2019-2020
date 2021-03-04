 <?php
require_once("../auth/EtreAuthentifie.php");
  if ($idm->getRole()=="vendeur"){
$resultat = "";
$resultat1 = "";

if(!isset($_POST['nom']) || !isset($_POST['description']) || !isset($_POST['qte']) || !isset($_POST['prix']) || !isset($_POST['ctid'])) {
include("AjoutProduitForm.php");
} else {
$nom = $_POST['nom'];
$description= $_POST['description'];
$qte= $_POST['qte'];
$prix= $_POST['prix'];
$ctid= $_POST['ctid'];
if ($nom=="" || $description=="" || !is_numeric($qte) || !$qte>0 || !is_numeric($prix) || !$prix>0 || !is_numeric($ctid) || !$ctid>0 ) {
include("AjoutProduitForm.php");
} else {
require("../db_config.php");
$uid = $idm->getUid();
try {
$db = new PDO($dsn,$username,$password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$SQL = "INSERT INTO produits VALUES (DEFAULT,?,?,?,?,?,?)";
$st = $db->prepare($SQL);
$res = $st->execute(array($nom, $description, $qte, $prix, $uid, $ctid));
?>

<?php
if (!$res) {
	$resultat1 = "Echec";
	$resultat = "L'ajout du produit \"<strong style=\"color:red;\"> $nom </strong>\" a échoué";
	include ('AjoutProduitForm.php');
} 
else{
	$resultat1 = "Succès";
	$resultat = "L'ajout du produit \"<strong style=\"color:red;\"> $nom </strong>\" a été effectué. ";
include ('AjoutProduitForm.php');
$db=null;
}
}

catch (PDOException $e){
echo "Erreur SQL: ".$e->getMessage();
}
}
}
} else {
	redirect($pathFor['Acheteur']);
}

?>