<?php 
include '../CLASS/cnx.php';
session_start();
$userId = $_SESSION['idUtl'];

if (isset($_POST['commander'])) {
  
    $result=$Pannier->affichePannier($userId);
     if ($result) {
   $res=$Commande->getCommande($userId);
   if($res){
    $Commande->details_commande($userId);
    $Pannier->deletePannieruser($userId);
    echo "<script>alert('Commande validée avec succès')</script>";
    // $msg='Commande validée avec succès';
    // header("Location: ../pannierp.php");
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
