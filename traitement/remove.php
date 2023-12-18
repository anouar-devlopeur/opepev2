<?php 
include '../CLASS/Connection.php';
include '../CLASS/categorie.php';
include '../CLASS/plante.php';
include '../CLASS/theme.php';
$cat=new Categorie();
$pla=new Plante();
$the=new Theme();
if(isset($_GET['Id'])){
  
 $cat->DeleteCategorie($_GET['Id']);
 header('Location: ../adminCat.php ');
 }
 if(isset($_GET['Idp'])){
$pla->dellet_plante($_GET['Idp']);
header('Location: ../adminPlant.php ');
 }

 if(isset($_GET['Idt'])){
     $the->delelt($_GET['Idt']);

 header('Location: ../AdminTheme.php ');
     }
    
?>