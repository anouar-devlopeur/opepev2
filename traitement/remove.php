<?php 
include '../CLASS/Connection.php';
include '../CLASS/categorie.php';
$cat=new Categorie();
if(isset($_GET['Id'])){
  
 $cat->DeleteCategorie($_GET['Id']);

 }
header('Location: ../adminCat.php ');
?>