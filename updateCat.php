<?php 
include './CLASS/Connection.php';
include './CLASS/categorie.php'


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>updateCat</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>
<body>
<main class=" d-flex">
<?php
 include './include/sideber.php'
    ?>
  <?php
   $cat=new Categorie();
if (isset($_GET['Id'])) {
    $idcat = $_GET['Id'];
  
}
$msg="";
if (isset($_POST['send'])) {
  $categorie=$_POST['categorie'];
  $cat->setNomCat($categorie);
$res=$cat->UpCategorie($idcat);

if($res) {
 $msg="Categorie  éte Modiifier";
}
}
?>

 
<div class="w-50 container border-success " style=" margin-top:6%">
<form class="text-center   w-100  p-5" action="" method="post">
    <p class="h4 mb-4">Catégorie </p>
   <p class="fs-3">ID Categorie : <?php  echo $idcat ?></p>
    <!-- Name cat -->
    <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-1" name="categorie" placeholder="Categorie" required>

    <!--  button -->
    <button class="btn btn-success w-75 mb-3 btn-block" name="send" >UPDATE</button><br>
    <span class="text-success fs-4"></span><?php echo $msg ?></span>
</form>
<!-- </div> -->
<!-- </div>  -->


</main>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>