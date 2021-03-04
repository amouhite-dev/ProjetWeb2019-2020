<?php
    include("../auth/EtreInvite.php");

    // Check if it is the first visit
    if ((empty($_POST['login']) && empty($_POST['password']))) {
        include('ConnexionForm.php');
        exit();
    }

    $error = "";
     
    foreach (['login', 'password'] as $name) {
        if (empty($_POST[$name])) {
            $error .= "La valeur du champs '$name' ne doit pas être vide<br>";
        }
    }

    // do the next step if no errors
    if (empty($error)) {
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        if (!$auth->existIdentity($data['login'])) {
            $error =  "Cet utilisateur n'existe pas<br>";
        }
    }

    // do the next step if no errors
    if (empty($error)) {
        $role = $auth->authenticate($data['login'], $data['password']);
        if (!$role) {
            $error = "Echec d'authentification<br>";
        }
    }

    // if errors then stop

    if (!empty($error)) {
        include('ConnexionForm.php');
        exit();
    }


    // Redirect to the original location
    // ToDo: Try to have a nicer $_SESSION usage...

    if (isset($_SESSION[SKEY])) {
        $uri = $_SESSION[SKEY];
        unset($_SESSION[SKEY]);
        redirect($uri);
        exit();
    }
    
    $role = $idm->getRole();
    if($role=='acheteur'){
          redirect($pathFor['Acheteur']);
    } else {
          redirect($pathFor['Vendeur']);
    }



