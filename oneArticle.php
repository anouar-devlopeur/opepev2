<?php

session_start();

include './CLASS/Connection.php';
if(isset($_GET['id'])) {
    $idArticle = $_GET['id'];

    // $query = "SELECT * FROM articles WHERE idAr = $idArticle";
    // $result = mysqli_query($conn, $query);

    // if($result) {
    //     $article = mysqli_fetch_assoc($result);
    // } else {
    //     echo "Erreur de récupération des données de l'article : " . mysqli_error($conn);
      
    // }
} else {
    // echo "Identifiant de l'article non spécifié.";
    // exit();
}
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
  
    <!-- End Navbar -->
            <div class="bg-white flex justify-center">
                <div class="mt-10 mx-8 mb-36" style="width: 50%;">
                                    <img style="width: 100%;" src="./img/IMG-657c1a9f2e37d2.63795595.jpeg" alt="<?php echo $article['nomAr']; ?>" class="">

                    <!-- <img style="width: 100%;" src="<?php echo $article['imageAr']; ?>" alt="<?php echo $article['nomAr']; ?>" class=""> -->
                </div>
                <div class="w-1/2 flex flex-col justify-center items-start">
                                        <h1 class="text-3xl font-bold text-gray-800 mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae enim nemo velit temporibus tempore quae maiores doloremque neque asperiores, esse incidunt voluptatem, repudiandae deleniti illo minima ullam cum perspiciatis accusamus!</h1>

                    <!-- <h1 class="text-3xl font-bold text-gray-800 mb-4"><?php echo $article['nomAr']; ?></h1> -->
                    <!-- <p class="text-base text-gray-600 text-left"><?php echo $article['descriptionAr']; ?></p> -->
                </div>
            </div>
            

            </div>
       
            

</body>
</html>
<?php include './include/footer2.php' ?>