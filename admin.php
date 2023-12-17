<?php 
include './CLASS/Connection.php';
include './CLASS/commande.php';
include './CLASS/plante.php';
include './CLASS/articleclass.php';
include './CLASS/categorie.php';
include './CLASS/theme.php';
include './CLASS/tags.php';


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
      <div class="px-4">
    
      
      
            <div class="cards row gap-5 justify-content-center  " style="width:100%;margin-top:20%">
                <div class=" card__items card__items--blue col-md-3 position-relative bg-danger rounded-2">
                    <div class="card__students d-flex flex-column gap-2 mt-3">
                      
                        <span class="fw-bold fs-3">Commande</span>
                    </div>
                    <div class="card__nbr-students mt-3">
                        <span class="h5 fw-bold nbr float-end">
                            <?php
                            $cmn=new Commande();
                            $res=$cmn->CountCommande();
                            
                             echo $res['total']; ?>
                        </span>
                    </div>
                </div>

                <div class=" card__items card__items--rose col-md-3 position-relative bg-success rounded-2 ">
                    <div class="card__Course d-flex flex-column gap-2 mt-3">
                  
                        <span class="fw-bold fs-3">Plante</span>
                    </div>
                    <div class="card__nbr-course mt-3">
                        <span class="h5 fw-bold nbr float-end">
                            <?php 
                            $pla=new Plante();
                            $re=$pla->CountPlant();
                            echo $re['totalplant'];
                            ?> 
                        </span>
                    </div>
                </div>

                <div class=" card__items card__items--yellow col-md-3 position-relative bg-info rounded-2">
                    <div class="card__payments d-flex flex-column gap-2 mt-3">
                     
                        <span class="fw-bold fs-3">Article</span>
                    </div>
                    <div class="card__payments mt-3">
                        <span class="h5 fw-bold nbr float-end">
                        <?php 
                            $a=new Articleclass();
                            $re=$a->CountArticle();
                            echo $re['totalplant'];
                            ?> 
                        </span>
                    </div>
                </div>
                <div class=" card__items card__items--yellow col-md-3 position-relative bg-warning rounded-2">
                    <div class="card__payments d-flex flex-column gap-2 mt-3">
                     
                        <span class="fw-bold fs-3">Categorie</span>
                    </div>
                    <div class="card__payments mt-3">
                        <span class="h5 fw-bold nbr float-end">
                        <?php 
                            $cat=new Categorie();
                            $re=$cat->CountCategorie();
                            echo $re['totalCat'];
                            ?> 
                        </span>
                    </div>
                </div>
                <div class=" card__items card__items--yellow col-md-3 position-relative bg-secondary rounded-2">
                    <div class="card__payments d-flex flex-column gap-2 mt-3">
                     
                        <span class="fw-bold fs-3">Theme</span>
                    </div>
                    <div class="card__payments mt-3">
                        <span class="h5 fw-bold nbr float-end">
                        <?php 
                            $cat=new Theme();
                            $re=$cat->CountTheme();
                            echo $re['totalCat'];
                            ?> 
                        </span>
                    </div>
                </div>
                <div class=" card__items card__items--yellow col-md-3 position-relative bg-primary rounded-2">
                    <div class="card__payments d-flex flex-column gap-2 mt-3">
                     
                        <span class="fw-bold fs-3">Tags</span>
                    </div>
                    <div class="card__payments mt-3">
                        <span class="h5 fw-bold nbr float-end">
                        <?php 
                            $cat=new Tags();
                            $re=$cat->CountTags();
                            echo $re['totalCat'];
                            ?> 
                        </span>
                    </div>
                </div>

              
            </div>

       
 
               
        </div>
</main>  
</body>
</html>