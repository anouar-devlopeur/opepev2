<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "opep2";

$con = new PDO("mysql:host=$servername;dbname=$database", $username, $password);



 
require_once __DIR__."./utilisateur.php";
$Utilisateur = new Utilisateur($con);
require_once __DIR__."./login.php";
$login= new Login($con);
require_once "validation.php";
$validation= new Validation($con);
require_once "clientclas.php"; 
$client= new Client($con);
require_once "categorie.php"; 
$Categorie = new Categorie($con);
require_once "pannier.php";
$Pannier = new Pannier($con);
require_once "plante.php";
$Plante= new Plante($con);
require_once "commande.php";
$Commande = new Commande($con);
require_once "theme.php";
$Theme= new Theme($con);
require_once "tags.php";
$Tags= new Tags($con);


   

    


?>
