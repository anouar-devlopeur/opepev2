<?php 
require_once '../CLASS/Connection.php';
require_once '../CLASS/pannier.php';
require_once '../CLASS/commande.php';
session_start();
$userId = $_SESSION['idUtl'];
$Pannier=new Pannier();
$Commande=new Commande();
if (isset($_POST['commander'])) {
     $Pannier->setIdUtl($userId);
    $result=$Pannier->affichePannier($Pannier);
     if (count($result) > 0) {
     $Commande->setIdUser($userId);
   $res=$Commande->getCommande();
   if($res){
    $Commande->details_commande($userId);
    $Pannier->deletePannieruser($userId);
    echo "<script>alert('Commande validée avec succès')</script>";
   
       }
       else {
        echo "<script>alert('Erreur lors de la validation de la commande')</script>";

       }

    }else{  
         echo "<script>alert('Erreur lors de la validation de la commande')</script>";
         
    }
     header("Location: ../pannierp.php");
    

}
?>
