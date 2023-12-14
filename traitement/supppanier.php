<?php 
include '../CLASS/cnx.php';
session_start();
$userId = $_SESSION['idUtl'];
echo 'ggg';

if (isset($_POST['supprimerPanier'])) {
    $idPanier = $_POST['idPanier'];
     $Pannier->deletePannier($idPanier);
header('location: ../pannierp.php');
}
?>
