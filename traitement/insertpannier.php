<?php 
include '../CLASS/Connection.php';
include '../CLASS/pannier.php';
session_start();
$userId = $_SESSION['idUtl'];

 if (isset($_POST['addToCart'])) {
    
     $plantId = $_POST['addToCart'];
  $Pannier=new Pannier();
  $Pannier->setIdUtl($userId);
  $Pannier->setIdPlante($plantId);
    $result= $Pannier->InsertPannier();

    if ($result) {
        // rje3 l page li 9bel
        header('location:' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "<script>alert('erreur d'ajout')</script>";
    }
}?>