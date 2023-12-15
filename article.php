<?php 

include './CLASS/cnx.php';
session_start();


if (empty($_SESSION['idUtl'])|| isset($_POST['logout'])) {
    $_SESSION['idUtl'] = "";
    session_destroy();
    header('location: index.php');
    exit();
}


$userId = $_SESSION['idUtl'];

$idth=$_GET['id'];



if (isset($_POST["save_data"])) {
  // $idth= $_POST['idth'];
  echo $idth;
  $name = $_POST['namarticle'];
  $desc =  $_POST['description_a'];
  date_default_timezone_set("Africa/Casablanca");
  $date = date("Y-m-d H:i:s");

  $i_name = $_FILES['image']['name'];
$i_tmp = $_FILES['image']['tmp_name'];

$si_extension = pathinfo($i_name, PATHINFO_EXTENSION);
$i_lower = strtolower($si_extension);
$allowed_extensions = array("jpg", "jpeg", "png");

if (in_array($i_lower, $allowed_extensions)) {
    $new_image = uniqid("IMG-", true) . '.' . $i_lower;
    $upload_path = './img/' . $new_image;
    move_uploaded_file($i_tmp, $upload_path);
      // Gérer les tags
      $tags = isset($_POST['tag']) ? implode(',', $_POST['tag']) : '';
      // insertion article
      $res=$Article->insertarticle($name,$desc,$upload_path,$date,$userId,$idth,$tags);
      // if ($res) {
         // header('Location: ../article.php');
      // }

}
}

// if(isset($_POST['cancel'])){
//   header("Location: article.php?id=$idth");
// }

// if(isset($_POST['addComm'])){
//   $commenter=$_POST['commente'];
  
//   $idAr=$_POST['articleId'];
  
  
//   // insertion du commentaire
//   $req = "INSERT INTO commentaire (contenuCom, idUtl, idAr) VALUES 
//         ('$commenter', '$idUser', '$idAr')";

//   $result = mysqli_query($conn, $req);

//   if ($result) {
//       echo "<script>alert('commenter cree avec succès.')</script>";
//       echo "<script>setTimeout(function(){ window.location.href = 'article.php?id=$idth'; }, 1000);</script>";
//   } else {

//       echo "Erreur de creation : " . mysqli_error($conn);
//   }
  
// }


?>

<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Article</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style> .sec1 h1 {
        font-size: 3.5vw;
        width: 24vw;
        color: black;
        width: 40vw;
        
    }

    .sec1 p {
        font-size: 1.2vw;
        margin-top: 2rem;
        color: black;
    }

    
    .sec1 button {
        color: white;
        background-color: transparent;
        border: 2px solid white;
        width: 10vw;
        margin-top: 2rem;
      
    }

    .sec3 .card {
        height: 26vw;
        margin-bottom: 1.5rem;
        color: black; 
        max-width: 19.5rem;
        background-color: white;
        text-align: center;
        padding: 10px;
        border-radius: 20px;
    }

    .card-img-custom {
        width: 40%;
        height: 10vw;
        object-fit: cover;
        border-radius: 8px;
    }

    .card-body {
        height: 100%;
    }

    .card-text {
        margin-bottom: 1rem; 
        color: #4F772D; 
        text-align: left;
    }

    .card-title {
        color: #4F772D;
        text-align: left; 
    }

    .pagination {
        justify-content: center;


    }
    .count{
        color: white;
        padding: 0px 6px;
        background-color: red;
        border-radius: 40px;
    }
    .panier{
        position: fixed;
        right: 40px;
    }
    /* nav */ 
    nav{
        
        z-index: 1000;
        height: 50px;
    }
    .nav__logo img {
        width: 120px;
        padding-top: 10px;
    }
    .search {
        position: relative;
        width: 26%;
        left: 22%;
    }
    .nav__menu{
        position: absolute;
        right:10rem;
    }

    .nav__list{
    padding-top: 25px;
    list-style: none;
    display: flex;
    gap: 3rem;
    align-items: center;
    
    }
    .nav__list a{
        color: white;
        cursor: pointer;
    }
    .nav__list a :hover{
        color: green;
        
    }
    .nav__list .nav__item a :hover{
        color: green;
    }
    .button--flex {
    display: inline-flex;
    align-items: center;
    column-gap: 0.5rem;
    }

    .navbar__button {
        position: absolute;
        background-color: red;
        border-radius: 0.35rem;
        font-size: 1.25rem;
    }
    .btnTags{
      border-radius: 10px;
      height: 40px;
      width: auto;
      background-color: transparent;
      color: black;
    }
    .imogies{
      cursor: pointer;
    }
    .modal-content{
      max-height: 80vh;
      overflow-y: scroll !important;
    }



</style>
</head>
  <body>
  <header style=" background-color: #132a137e; height:80px; width:100%; position:absolute;  top:0;">
        <nav class="nav container">
                <a href="#" class="nav__logo">
                    <img src="plantes/logo.png" alt="logo">
                </a> 
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li >
                            <a href="client.php"  style="font-size: 20px ; ">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="blog.php"  style="font-size: 20px;">Blog</a>
                        </li>
                        <!-- shopping cart -->
                        <li>
                          <a href="panier.php" style="cursor: pointer;">
                            <i class="ri-shopping-bag-line" style="font-size:27px;"></i>
                        </a>
                      </li>
                         <!-- log out -->
                        <li>
                        <form method="post"  >
                        <button class=" btn ri-logout-box-r-line" style="font-size:27px;cursor: pointer; background-color: transparent;" name="logout"></button>

                        </form>
                      </li>

                    </ul>  

                  

                    </div>   
            </nav>
    </header>
  
    <section class="w-100 " style="margin-top: 150px;">
<!-- search -->
          <div class="w-75 input-group rounded mx-auto my-3">
          <form class="w-50 input-group rounded mx-auto md-form form-sm" method="post" action="">
            <input style="width:30vw ; height: 3vw " class="" type="text" placeholder="Search" aria-label="Search" id="Search" name="keyword">
          </form>
          </div>
 
<div class="barre d-flex justify-content-center align-items-center gap-5">
      <div class="tags d-flex gap-3 ">
  <div><a href="article.php?id=<?php echo $idth;?>" class="btn btn-success" style="font-size: 20px;color:black ; margin-left:25px">View all</a></div>
          <?php
             $result=$Tags->get_tag($idth);
         
             
             foreach ($result as $row) {
                 echo '<button class="btnTags btns  bg-success" value="' . $row['nomTag'] . '">' . $row['nomTag'] . '</button>';
             }
         
             
                      
            ?>
  </div>
<!-- modal article -->
  <!-- ------------add article --------------->
  <div style="margin-left: 50px">
    <div class="row justify-content-center ">
        <div class="col-md-8">
           
                <div class=""> 
           <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#insertdata">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" fill="currentColor" class="bi bi-plus-circle " viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                </button>

                </div>
        
        </div>
    </div>
  </div>
</div>

  <div class="modal fade"  id="insertdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertdataLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="insertdataLabel">INSERT ARTICLE</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
     
        <form  method="post" enctype="multipart/form-data">
        <div class="modal-body">
        <div class="from-group mb-3">
        <!-- <input type="hidden" name="idth" class=" form-control" value="<?php echo $idth ?>"> -->
          <label for="" class="mb-2 fs-4">Name Article</label>
          <input type="text" name="namarticle" class=" form-control" placeholder="name">
        </div>
        <div class="from-group mb-3">
          <label for="" class="mb-2 fs-4">Description</label>
          <input type="text" name="description_a" class=" form-control" placeholder="description">
        </div>
        <div class="from-group mb-3">
          <label for="" class="mb-2 fs-4">Image</label>
          <input type="file" name="image" class=" form-control" placeholder="image">
        </div>
        <div class="from-group mb-3">
          <label for="" class="mb-2 fs-4">Tags</label>
          <p>Selectionnez un tag</p>
          
          <?php
           
             $result=$Tags->get_tag($idth);
         
            foreach ($result as $row) {
              echo '<input type="radio"  value="'.$row['nomTag'].'" name="tag[]">';
              echo $row['nomTag'];
              echo "<br>";
              }
            
          ?>
        </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="save_data" class="btn btn-primary" value="Save Data"></input>
        </div>
        </form>
      </div>
    </div>
  </div> 
  <div id="cardT" class="w-100 row d-flex justify-content-center gap-5 test" style="margin-top: 40px">

<?php  
$result = $Theme->article_by_idth($idth);

  foreach ($result as $row) {
 
    $articleId = $row['idAr'];
?>

<div class="card mb-4 col-" style="width: 25%">

    <div class=" mt-2 ">
        <img class="card-img-top" style="height: 20vw;" src="<?php echo $row['imageAr'] ?>" alt="Card image cap">
    </div>

    <div class="card-body">
        <h4 class="card-title"><?php echo $row['nomAr'] ?></h4>
        <span style="color: black;"><?php echo $row['dateAr'] ?></span>
        <p class="card-text" style="color: black;"><?php echo $row['disc'] ?></p>
        
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

<?php }  ?>

</div>
  </section>

<!------------------------- Pagination ----------------------->
<div class="pagination  d-flex justify-content-center">
  <?php

  $pagination=$Article->pagination($idth);


  $totalpage = ceil($pagination / 6);
  if ($totalpage>1) {
  ?>
    <div class="pagination d-flex gap-2 justify-content-center">
      <?php
      for ($i = 1; $i <= $totalpage; $i++) {
      ?>
        <button class="btn btn-success page" value="<?php echo $i ?>"><?php echo $i ?></button>
      <?php
       }
      ?>
    </div>
  <?php   
   }
 ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script>
   var Search = document.getElementById("Search");
   let section = document.querySelector('.test');
  //affichage
  
    function fetchArticle() {
       let section = document.querySelector('.test');
      let XML = new XMLHttpRequest();
  
      XML.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          section.innerHTML = this.responseText;
        }
      };
  
      XML.open('GET', './traitement/affiche.php?idTh=<?php echo $idth ?>');
      XML.send();
    }
    // fetchArticle();
    // recherche article
    Search.addEventListener("input", function() {
    let s = Search.value;
    if (s === '') {
    fetchArticle();
    } else {

      let XML = new XMLHttpRequest();
      XML.onreadystatechange = function() {
        if (this.status == 200) {

          section.innerHTML = this.responseText;
        }
      }

      XML.open('GET', './traitement/search.php?search=' + s + '&idTh=<?php echo $idth ?>');
      XML.send();
    }
  });
    // pagination
 
  var pagebutton = document.querySelectorAll('.page');
  pagebutton.forEach(BTNNM => {
    BTNNM.addEventListener("click", function() {
      let pagevalue = this.value;



      let HTTP = new XMLHttpRequest();

      HTTP.onreadystatechange = function() {
        if (this.status == 200) {
          section.innerHTML = this.responseText;
        }
      }
      console.log(pagevalue);
      console.log("theme=<?php echo $idth; ?>");
      

      HTTP.open('POST', './traitement/affpagintion.php');
       HTTP.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      HTTP.send("page=" + pagevalue + '&theme=<?php echo $idth ?>');

    })
  })
</script>
</body>
</html>