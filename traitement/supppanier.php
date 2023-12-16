<?php 
include '../CLASS/Connection.php';
include '../CLASS/pannier.php';
session_start();
$userId = $_SESSION['idUtl'];


if (isset($_POST['supprimerPanier'])) {
    $idPanier = $_POST['idPanier'];
    $Pannier=new Pannier();
     $Pannier->deletePannier($idPanier);
header('location: ../pannierp.php');
}
?>
