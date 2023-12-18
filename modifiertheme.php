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
   $Theme=new Theme();
   if (isset($_GET['Idpt'])) {
       $idth = $_GET['Idpt'];
      $row=$Theme->ThemeIdth($idth);
      
   }

    $the = new Theme();
    if (isset($_POST['addtheme'])) {
        $idth = $_GET['Idpt'];
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
    $the->UpdateTheme($idth);
    header('Location:AdminTheme.php');
   }
?>

 
<div class="w-50 container border-success " style=" margin-top:6%">
<form method="POST" action="" enctype="multipart/form-data">
                                
                                <div class="">
                                  <label for="recipient-name" class="col-form-label">Nom Theme:</label>
                                  <input type="text" class="form-control" id="recipient-name" name="Name" value="<?=   $row->getNomTh()?>">
                                </div>
                                <div class="">
                                  <label for="recipient-name" class="col-form-label">Description:</label>
                                  <input type="text" class="form-control" id="recipient-name" name="Description" value="<?=   $row->getDescriptionTh()?>">
                                </div>
                                <div class="">
                                  <label for="recipient-name" class="col-form-label">Image:</label>
                                  <input type="file" class="form-control" id="recipient-name" accept=".jpg,.png,.jpeg" name="img" value="<?=   $row->getImageTh()?>">
                                </div>

                             
                                <div class="modal-footer">
                              <button type="submit" name="addtheme" class="btn btn-primary">Update Theme</button>
                            </div>
                              </form>
</div> 


</main>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>