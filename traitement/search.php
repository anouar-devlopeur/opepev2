<?php
include '../CLASS/Connection.php';
include '../CLASS/articleclass.php';

if(isset($_GET['search'])) {
   ?>
   <div class="w-100 row gap-4  gap-2 mx-auto justify-content-center">
   <?php
   $search = $_GET['search'];
   $idth = $_GET['idTh'];
   $Article=new Articleclass();
   $result=  $Article->search( $idth,$search);
foreach($result as $row) {


    ?>
              <div class="card mb-4 col- "style="width:25%">
                <div class=" mt-2 ">
                    <img class="card-img-top " style="height: 20vw;" src="<?php echo $row['imageAr']?>"

                    alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row['nomAr'] ?></h4>
                    <span class="mask rgba-white-slight text-success"><?php echo $row['dateAr'] ?></span>
                    <p class="card-text" ><?php echo $row['descriptionAr'] ?></p>
                    <div class="imogi_Read d-flex justify-content-between align-items-center">

                    <div class="imogi d-flex gap-4">
                           
                
                    </div>
                    <div class="read d-flex justify-content-center align-items-center">
                <a href="./oneArticle.php?id=<?php echo $articleId?>" name="read_more" id="read" class="btn btn-light-blue btn-md">Read more </a>
                <svg xmlns="http://www.w3.org/2000/svg" style="cursor: pointer;" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                </svg>
                 </div>


                    </div>
                </div>



 </div>
    <?php 
    }
    ?>
    <?php
     }

// }
?>