<?php 
include '../CLASS/Connection.php';
include '../CLASS/pannier.php';
include '../CLASS/commande.php';
session_start();
$userId = $_SESSION['idUtl'];
$Pannier=new Pannier();
$Commande=new Commande();
if (isset($_POST['commander'])) {
  
    $result=$Pannier->affichePannier($userId);
     if ($result) {
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
