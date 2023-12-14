<?php 
include './CLASS/cnx.php';
include './CLASS/cnx.php';
session_start();


if (empty($_SESSION['idUtl'])|| isset($_POST['logout'])) {
    $_SESSION['idUtl'] = "";
    session_destroy();
    header('location: index.php');
    exit();
}


$userId = $_SESSION['idUtl'];

// $idth=$_GET['id'];
// session_start();

// $idUser=$_SESSION['idUtl'];


// if (isset($_POST["save_data"])) {
//   $name = $_POST['namarticle'];
//   $desc = mysqli_real_escape_string($conn, $_POST['description_a']);
//   date_default_timezone_set("Africa/Casablanca");
//   $date = date("Y-m-d H:i:s");

//   $i_name = $_FILES['image']['name'];
//   $i_tmp = $_FILES['image']['tmp_name'];

//   $si_extension = pathinfo($i_name, PATHINFO_EXTENSION);
//   $i_lower = strtolower($si_extension);
//   $arrytype = array("jpg", "jpeg", "png");

//   if (in_array($i_lower, $arrytype)) {
//       $new_image = uniqid("IMG-", true) . '.' . $i_lower;
//       $upload_path = './img/' . $new_image;
//       move_uploaded_file($i_tmp, $upload_path);

//       // Gérer les tags
//       $tags = isset($_POST['tag']) ? implode(',', $_POST['tag']) : '';

//       $qery = "INSERT INTO articles( nomAr, descriptionAr, imageAr, dateAr, idUtl, idTh, tagsAr)
//                VALUES ('$name', '$desc', '$upload_path', '$date', '$idUser', '$idth', '$tags')";
//       $result = mysqli_query($conn, $qery);

//       if ($result) {

       
//           echo "<script>alert('Article cree avec succès.')</script>";
//           echo "<script>setTimeout(function(){ window.location.href = 'blog.php'; }, 1000);</script>";
//       } else {

//           echo "Erreur de creation : " . mysqli_error($conn);
//       }
//   } 
// }

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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Article</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
<!--  -->
<style>


    .sec1 h1 {
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
<!--  -->
</head>
  
  <body>
  <!-- <header style=" background-color: #132a137e; height:80px; width:100%; position:absolute;">
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
                        <!-- <li>
                          <a href="panier.php" style="cursor: pointer;">
                            <i class="ri-shopping-bag-line" style="font-size:27px;"></i>
                        </a>
                      </li> -->
                         <!-- log out -->
                        <!-- <li>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                          <a href="index.php">
                          <i class="ri-logout-box-r-line" style="font-size:27px;"></i>
                        </a>
                        </form>
                      </li>

                    </ul>  

                  

                    </div>   
            </nav>
    </header>  -->
    <section>
    <div style="margin-left: 50px;" >
        <div class=" justify-content-center ">
            <div class="">
                <div class="">
                    <div >
                      
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
</div>
 

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
<!-- test  -->


</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

