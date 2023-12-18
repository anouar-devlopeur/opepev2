<?php 
include './CLASS/Connection.php';
include './CLASS/theme.php';


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
//    $cat=new Categorie();
// if (isset($_GET['Id'])) {
//     $idcat = $_GET['Id'];
  
// }
// $msg="";
// if (isset($_POST['send'])) {
//   $categorie=$_POST['categorie'];
//   $cat->setNomCat($categorie);
// $res=$cat->UpCategorie($idcat);

// if($res) {
//  $msg="Categorie  éte Modiifier";
// }
// }
?>

 
<div class="w-50 container border-success " style=" margin-top:6%">
<form method="POST" action="" enctype="multipart/form-data">
                                
                                <div class="">
                                  <label for="recipient-name" class="col-form-label">Nom Theme:</label>
                                  <input type="text" class="form-control" id="recipient-name" name="Name">
                                </div>
                                <div class="">
                                  <label for="recipient-name" class="col-form-label">Description:</label>
                                  <input type="text" class="form-control" id="recipient-name" name="Description" >
                                </div>
                                <div class="">
                                  <label for="recipient-name" class="col-form-label">Image:</label>
                                  <input type="file" class="form-control" id="recipient-name" accept=".jpg,.png,.jpeg" name="img">
                                </div>

                             
                                <div class="modal-footer">
                              <button type="submit" name="addtheme" class="btn btn-primary">Ajouter Theme</button>
                            </div>
                              </form>
</div> 


</main>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>