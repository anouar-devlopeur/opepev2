<?php
include '../CLASS/Connection.php';
include '../CLASS/theme.php';
$the = new Theme();
if (isset($_POST['addtheme'])) {
   $Name = $_POST['Name'];
   $Description= $_POST['Description'];
   $image = $_FILES['img']['name'];
   $tempname = $_FILES['img']['tmp_name'];  
   $folder = "../img/".$image;
   
   if(move_uploaded_file($tempname,$folder)){
       // echo 'images est uplade';
   }
 
   $the->setNomTh($Name);
   $the->setDescriptionTh($Description);
   $the->setImageTh($image);
$the->InsertTheme();

// die($the->get_theme());



}
header('Location: ../AdminTheme.php ');
