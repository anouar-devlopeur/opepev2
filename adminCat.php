<?php
include './CLASS/Connection.php';
include './CLASS/categorie.php'
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
       
        
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Categorie</div>
                <div class="btn-add d-flex gap-3 align-items-center">
                    <div class="short">
                        <i class="far fa-sort"></i>
                    </div>
                    <?php
                     include './include/popupadd.php'; ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table student_list table-borderless">
                    <thead>
                        <tr class="align-middle">
                            <th class="">#</th>
                            <th>Categorie</th>
                            <th class="opacity-0">list</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                        $cat=new Categorie();
                          $res=$cat->GetCat();
                          foreach($res as $value): ?>
                        
                      <tr class="bg-white align-middle">
                                 <td><?php echo $value->getIdcat() ; ?></td>
                                <td><?php echo $value->getNomCat();  ?></td>
                                <td class="d-md-flex gap-3 mt-3">
                                <a href="updateCat.php?Id=<?php echo $value->getIdcat() ;?>"><i class="far fa-pen"></i></a>
                                <a href="./traitement/remove.php?Id=<?php echo $value->getIdcat() ;?>"><i class="far fa-trash"></i></a>
                                </td>
                        </tr> 

                        <?php endforeach; ?>
                 
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