<?php
    include("../auth/EtreInvite.php");
    if (empty($_POST['NewMdp'])) {
        include('MdpComfirm.php');
        exit();
    }

    $login = $_POST['login'];

	$error = "";

	foreach (['login','NewMdp', 'NewMdp2'] as $name) {
        if (empty($_POST[$name])) {
            $error .= "La valeur du champs '$name' ne doit pas être vide";
        } else {
            $data[$name] = $_POST[$name];
        }
    }
    

    if ($data['NewMdp'] != $data['NewMdp2']) {
        $error .= "Les deux mot de passe saisies ne sont pas identiques";
    }

     if (empty($error)) {
        $data['login'] = $_POST['login'];
        if (!$auth->existIdentity($data['login'])) {
            $error .=  "Cet utilisateur n'existe pas";
        }
    }

    if (!empty($error)) {
        include('MdpComfirm.php');
        exit();
    }

    foreach (['NewMdp'] as $name) {
        $clearData[$name] = $data[$name];
    }

    $passwordFunction =
        function ($s) {
            return password_hash($s, PASSWORD_DEFAULT);
        };

    $clearData['NewMdp'] = $passwordFunction($data['NewMdp']);
    $mdp = $clearData['NewMdp'];

    try {
        $SQL = "UPDATE users SET mdp=? WHERE login=?";
        $stmt = $db->prepare($SQL);
        $res = $stmt->execute(array($mdp,$login));

        if (!$res) {
			$error = "Echec ! La modification du mot de passe a échoué";
			include 'MdpComfirm.php';
		} else{
			$error = "Succes ! La modification du mot de passe est réussi. ";
			include 'MdpComfirm.php';
		}
    } catch (\PDOException $e) {
        http_response_code(500);
        echo "Erreur de serveur.";
        exit();
    }
?>
		