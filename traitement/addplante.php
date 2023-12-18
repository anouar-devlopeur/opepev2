<?php 
include '../CLASS/Connection.php';
include '../CLASS/plante.php';
include '../CLASS/categorie.php';
$plant=new Plante();

if (isset($_POST['addplant'])){

    $image = $_FILES['img']['name'];
    $tempname = $_FILES['img']['tmp_name'];  
    $folder = "../img/".$image;
    
    if(move_uploaded_file($tempname,$folder)){
        // echo 'images est uplade';
    }
$Name=$_POST['Name'];
$Description=$_POST['Description'];
$Prix=$_POST['Prix'];
$cate=$_POST['cate'];
$plant->setNomPlante($Name);
$plant->setDescriptionPlante($Description);
$plant->setPrix($Prix);
$plant->setIdCat($cate);
$plant->setImagePlante($image);
$res=$plant->insertPlante();

if($res){
    header('Location: ../adminPlant.php ');
}
  
    
}