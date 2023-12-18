<?php
include './CLASS/Connection.php';
include './CLASS/plante.php';
include './CLASS/categorie.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Dashbord</title>
</head>
<body>
<main class=" d-flex">
<?php
     
    include './include/sideber.php'
    ?>
   
    <div class="container-fluid px-4 w-75">
       
          
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Plante</div>
                <div class="btn-add d-flex gap-3 align-items-center">
                    <div class="short">
                        <i class="far fa-sort"></i>
                    </div>
                    <?php
                     include './include/popupaddplant.php'; ?>
                </div>
                <div class="table-responsive">
                <table class="table student_list table-borderless">
                    <thead>
                        <tr class="align-middle">
                            <th class="opacity-0">vide</th>
                            <th>Plante</th>
                            <th>Image</th>
                            <th>description</th>
                            <th>prix</th>
                            <th>idCategorie</th>
                            <th class="opacity-0">list</th>
                            <!-- idPlante -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // nomPlante`, `imagePlante`, `descriptionPlante`, `stock`, `prix`, `idCategorie
                        $plante=new Plante();
                        $result=$plante->get_plant();
                          foreach($result as $value):
                        ?>
                      <tr class="bg-white align-middle">
                      <td><?php echo $value->getIdPlante() ?></td>
                                <td><?php echo $value->getNomPlante() ?></td>
           <td><img src="./img/<?php echo $value->getImagePlante() ?>" alt="img" height="50" with="50"></td>

                                <td><?php echo $value->getDescriptionPlante() ?></td>
                                <td><?php echo $value->getPrix() ?></td>
                                <td><?php echo $value->getIdCat()?></td> 
                                <td class="d-md-flex gap-3 mt-3">
                                  <a href="modifierplant.php?Idp=<?php echo $value->getIdPlante()?>"><i class="far fa-pen"></i></a>
                                  <a href="./traitement/remove.php?Idp=<?php echo $value->getIdPlante()?>"><i class="far fa-trash"></i></a>
                                </td>
                        </tr> 

                        <?php 
                     endforeach;
                     ?>
                    </tbody>
                </table>
            </div>
            </div>
          
        
</main>
 <script src="js/bootstrap.bundle.js"></script>
 <script>
 
 </script>
</body>
</html>