<?php

$authTableData = [
    'table' => 'users',
    'idfield' => 'login',
    'cfield' => 'mdp',
    'uidfield' => 'uid',
    'rfield' => 'role',
];

$pathFor = [
    "login"  => "../Identification/Connexion.php",
    "logout" => "../Identification/Deconnexion.php",
    "adduser" => "../Identification/Inscription.php",
    "Acheteur" => "../Acheteur/AccueilAcheteur.php",
    "Vendeur" => "../Vendeur/AccueilVendeur.php",
    "root"   => "../index.php",
];

const SKEY = '_Redirect';
