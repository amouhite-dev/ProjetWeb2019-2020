<?php
    include("../auth/EtreInvite.php");

    if (empty($_POST['login'])) {
        include('InscriptionForm.php');
        exit();
    }

    $error = "";

    foreach (['nom', 'prenom', 'login', 'mdp1', 'mdp2', 'role'] as $name) {
        if (empty($_POST[$name])) {
            $error .= "La valeur du champs '$name' ne doit pas être vide<br>";
        } else {
            $data[$name] = $_POST[$name];
        }
    }

    // Vérification si l'utilisateur existe
    $SQL = "SELECT uid FROM users WHERE login=?";
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute([$data['login']]);

    if ($res && $stmt->fetch()) {
        $error .= "Cet identifiant est déjà utilisé.<br>";
    }

    if ($data['mdp1'] != $data['mdp2']) {
        $error .= "Les deux mot de passe saisies ne sont pas identiques<br>";
    }

    if (!empty($error)) {
        include('InscriptionForm.php');
        exit();
    }


    foreach (['nom', 'prenom', 'login', 'mdp1', 'role'] as $name) {
        $clearData[$name] = $data[$name];
    }

    $passwordFunction =
        function ($s) {
            return password_hash($s, PASSWORD_DEFAULT);
        };

    $clearData['mdp1'] = $passwordFunction($data['mdp1']);

    try {
        $SQL = "INSERT INTO users(nom,prenom,login,mdp,role) VALUES (:nom,:prenom,:login,:mdp1,:role)";
        $stmt = $db->prepare($SQL);
        $res = $stmt->execute($clearData);
        $id = $db->lastInsertId();
        $auth->authenticate($clearData['login'], $data['mdp1']);
        // echo "Utilisateur $clearData[nom] : " . $id . " ajouté avec succès.";
        $role=$idm->getRole();
        if($role=='acheteur'){
          redirect($pathFor['Acheteur']);
        } else {
          redirect($pathFor['Vendeur']);
        }
        // redirect($pathFor['root']);
    } catch (\PDOException $e) {
        http_response_code(500);
        echo "Erreur de serveur.";
        exit();
    }





