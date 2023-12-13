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

   

    


?>
