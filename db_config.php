<?php
    $hostname = "localhost";
    $dbname = "2019_projet3_vente";
    $username = "root";
    $password = "";

    $dsn = "mysql:host=$hostname;dbname=$dbname;charset=utf8";
    //$dsn = "sqlite:" . __DIR__ . "/../db/users.sqlite";

    /*
     Définition de la BD:
     Pour MySQL:

      CREATE TABLE users
    (
        userid INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
        nom VARCHAR(30),
        prenom VARCHAR(30),
        login VARCHAR(30) NOT NULL UNIQUE,
        mdp VARCHAR(255) NOT NULL,
        role ENUM('user', 'admin') DEFAULT 'user' NOT NULL
    )

    Pour SQLite:

    CREATE TABLE users
    (
        userid INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
        nom VARCHAR(30),
        prenom VARCHAR(30),
        login VARCHAR(30) NOT NULL,
        mdp VARCHAR(255) NOT NULL,
        role CHECK(role in ('user', 'admin')) DEFAULT 'user' NOT NULL
    )
    CREATE UNIQUE INDEX users_login_uindex ON users (login)

     */
?>
