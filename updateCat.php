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
    // session_start();
    // include 'conixion.php';
    // $_SESSION["id"]= $_GET['Id'];
    // $id = $_SESSION["id"];
    // $statement = $con -> prepare("SELECT * FROM students_list WHERE Id = $id");
    // $statement->execute();
    // $table = $statement -> fetch();

  ?>
 
<div class="w-50 container border-success " style=" margin-top:6%">
<form class="text-center   w-100  p-5" action="" method="post">
    <p class="h4 mb-4">Catégorie </p>
    <!-- <p class="fs-3">ID Categorie : <?php  echo $id ?></p> -->
    <!-- Name cat -->
    <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-1" name="cat" placeholder="Categorie" required>
    <!-- <span class="text-danger"><?php echo $msg ?></span><br> -->
    <!--  button -->
    <button class="btn btn-success w-75 mb-3 btn-block" name="send" >UPDATE</button>
</form>
</div>
</div>
<div class="container w-50 " style=" margin-top:6%">
<form class="w-100 border-light p-4" action="" method="post" >
<!-- <img src="../img/<?php echo $img; ?>" class="   " style="width:40%;margin-left: 30%;">  -->
<p class="h4 mb-4 text-center">Plante </p>
<!-- <p class="text-center" name="id">Plante N° :<?php echo $id ?> </p> -->
 

<div class="d-flex">
<label class=" w-25 text-success fs-4 mb-2">Nom Plante : </label>
<input type="text" id="Nom" class="form-control mb-4" name="nomplante"  placeholder="Nom Plante" value="" disabled required>
</div>

<div class="d-flex mt-1">
<label class=" w-25 text-success fs-4 mb-2"> Prix:</label>
<input type="text" id="prix" class="form-control mb-4" name="prix" placeholder="prix" value="" disabled required> 
</div>
<input type="text" id="prix" class="form-control mb-4" name="prixnew" placeholder="prix"  required> 
<div class="d-flex">
<label class=" w-25 text-success fs-4 mb-2"> ID-Cat:</label>
<input type="text" id="idcat" class="form-control mb-4" name="cat" placeholder="categorie" value="" disabled required> 
</div>
  
 
<input class="btn btn-success w-50   mb-3 btn-block" style="margin-left: 20%;" value="UPDATE" name="submit" type="submit"></input>


</form>
</div>
</main>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>