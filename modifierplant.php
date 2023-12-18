<?php 
include './CLASS/Connection.php';
include './CLASS/plante.php';
include './CLASS/categorie.php';


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
   $plntae=new Plante();
if (isset($_GET['Idp'])) {
    $idplant = $_GET['Idp'];
   $row= $plntae->get_plantid($idplant);
  //  echo $row['nomPlante'];
   
}
$msg="";
if (isset($_POST['addplant'])) {
  $Name=$_POST['Name'];
  $Description=$_POST['Description'];
  $Prix=$_POST['Prix'];
  $cate=$_POST['cate'];
  $image = $_FILES['img']['name'];
  $tempname = $_FILES['img']['tmp_name'];  
  $folder = "../img/".$image;
  
  if(move_uploaded_file($tempname,$folder)){
      // echo 'images est uplade';
  }
  $plntae->setIdCat($cate);
  $plntae->setNomPlante($Name);
  $plntae->setDescriptionPlante($Description);
$plntae->setPrix($Prix);
$plntae->setImagePlante($image);
$res=$plntae->update_plante($idplant);
if($res){

  header('Location:adminPlant.php');
}


}
?>

<div class="w-50 container border-success " style=" margin-top:6%">
<form method="POST" action="" enctype="multipart/form-data">
                                
                                <div class="">
                                  <label for="recipient-name" class="col-form-label">Nom Plante:</label>
                                  <input type="text" class="form-control" id="recipient-name" name="Name" value="<?php  echo $row['nomPlante']?>" >
                                </div>
                                <div class="">
                                  <label for="recipient-name" class="col-form-label">Image:</label>
                                  <input type="file" class="form-control" id="recipient-name" accept=".jpg,.png,.jpeg" name="img" value=" <?php  echo $row['imagePlante']?>">
                                </div>
                                <div class="">
                                  <label for="recipient-name" class="col-form-label">Description:</label>
                                  <input type="text" class="form-control" id="recipient-name" name="Description" value=" <?php  echo $row['descriptionPlante']?>" >
                                </div>
                                <div class="">
                                  <label for="recipient-name" class="col-form-label">Prix:</label>
                                  <input type="text" class="form-control" id="recipient-name" name="Prix" value=" <?php  echo $row['prix']?>" >
                                </div>
                                <div class="">
                                  <label for="recipient-name" class="col-form-label">Ctegorie:</label>
                                  <select name="cate" id=""  class="form-select" aria-label="Default select example>
                               <?php
                                $cat=new Categorie();
                                $res=$cat->GetCat();
                                foreach($res as $row){
                                 ?>
                               
                                      <option value="<?php echo $row->getIdcat() ?>" ><?php echo $row->getNomCat() ?></option>
                                      <?php } ?>
                                  </select>

                                </div>
                              
                                <div class="modal-footer">
                              <button type="submit" name="addplant" class="btn btn-primary">update Plante</button>
                            </div>
                            <span class="fs-3"></span><?=  $msg ?></span>
                              </form>
 
      </div>
</main>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>