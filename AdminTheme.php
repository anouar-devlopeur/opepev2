<?php
include './CLASS/Connection.php';
include './CLASS/theme.php';
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
<main class="dashboard d-flex">
<?php
     
    include './include/sideber.php'
    ?>
    <!-- start content page -->
    <div class="container-fluid px-4 w-75">
       
            <!-- start student list table -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Theme</div>
                <div class="btn-add d-flex gap-3 align-items-center">
                    <div class="short">
                        <i class="far fa-sort"></i>
                    </div>
                    <?php
                     include './include/popupaptheme.php'; ?>
                </div>
                <div class="table-responsive">
                <table class="table student_list table-borderless">
                    <thead>
                        <tr class="align-middle">
                            <th class="opacity-0">vide</th>
                            <th>Theme</th>
                            <th>description</th>
                            <th>Image</th>
                          
                            <th class="opacity-0">list</th>
                            <!-- idPlante -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $them=new Theme();
                      $res=  $them->get_theme();
                        foreach ($res as $value) :
                        ?>  <tr class="bg-white align-middle">
                        <td><?php echo $value->getIdTh() ?></td>
                                  <td><?php echo $value->getNomTh() ?></td>
                                  <td><?php echo $value->getDescriptionTh() ?></td>
             <td><img src="./img/<?php echo $value->getImageTh() ?>" alt="img" height="50" with="50"></td>
                                  <td class="d-md-flex gap-3 mt-3">
                                    <a href="modifiertheme.php?Idpt=<?php echo $value->getIdTh()?>"><i class="far fa-pen"></i></a>
                                    <a href="./traitement/remove.php?Idt=<?php echo $value->getIdTh()?>"><i class="far fa-trash"></i></a>
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