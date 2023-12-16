<?php
include './CLASS/Connection.php';
include './CLASS/articleclass.php';
include './CLASS/commentaire.php';



session_start();
$email=$_SESSION['emailUtl']; 
$idUtl=$_SESSION['idUtl'];
if (empty($_SESSION['idUtl'])|| isset($_POST['logout'])) {
    $_SESSION['idUtl'] = "";
    session_destroy();
    header('location: index.php');
    exit();
}
if(isset($_GET['id'])) {
   $idArticle = $_GET['id'];
   $Article=new Articleclass();
   $article= $Article->affiche_by_idarticle($idArticle );
 
} 
// if(isset($_POST['cmn'])){
//     $comnt=new Commentaire();
//     $comnt->setContenuCom($_POST['donnecmn']);
//     $comnt->setIdUtl($idUtl);
//     $comnt->setIdAr($_POST['articleid']);
//     $comnt->insertContenuCom();
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
  
    <!-- End Navbar -->
    <section class="" style=" margin-top:6%;  ">
    <div class="d-flex justify-content-start gap-5 align-items-lg-start w-100 " style="height: auto;">

 
        <div class="ms-2 w-50 mb-2">
                <img style=" width:100%" src="<?php echo $article['imageAr']; ?>" alt="<?php echo $article['nomAr']; ?>" class=""> 

        </div>
        <div class="w-50">
            <h3 class="text-base fw-bold fs-2"><?php echo $article['nomAr']; ?></h3>
            <p class="fs-4 text-base fw-bold">
            <?php echo $article['descriptionAr']; ?>
          </p>
         
              <div>

               <div class="ps-3 pb-4">
                                            <?php 
                        $comnt = new Commentaire();
                       
                        $rowcmn = $comnt->get_ContenuCom($idArticle);
                           
                   
                        foreach ($rowcmn as $row) {
                         
                        ?>
                            <div>
                                <h3 class="fs-3"><?php echo $row['nomUtl']  ?></h3>
                                <!-- <p  name="comntaire" class="fs-5 mb-2 border-0"  ><?php echo $row['contenuCom']  ?></p> -->
                                <form action="./traitement/updatCmnt.php" method="post">
                                <input disabled name="comntaire" class="fs-5 mb-2 border-0" value="<?php echo $row['contenuCom']  ?>" id="inputField<?= $row['idCom'] ?>"></input>
                                
                                <?php if ($row['emailUtl'] == $email && $row['idUtl']==$idUtl) { ?>
                                    <i id="toggleButton<?= $row['idCom'] ?>" class="fa fa-ellipsis-v" onclick="toggleButtonAndEnableInput(<?= $row['idCom'] ?>)" aria-hidden="true"></i>
                                <i id="toggleaff<?= $row['idCom'] ?>" class="fa fa-ellipsis-v" onclick="toggleButtonAnddisabled(<?= $row['idCom'] ?>)" aria-hidden="true" style="display: none;"></i>
                        
                                    <div class="me-5 d-flex gap-2">
                                        <a id="hiddenButton<?= $row['idCom'] ?>" href="./traitement/supprimercmnt.php?idCom=<?php echo $row['idCom']; ?>&idArticle=<?php echo $idArticle; ?>" class="btn btn-danger" name="supcmn" style="display: none;">Supprimer</a>
                                            <input type="hidden" name="comment_id" value="<?php echo $row['idCom']; ?>">
                                            <input type="hidden" name="Article_id" value="<?php echo $idArticle; ?>">
                                            <button type="submit" id="hidden<?= $row['idCom'] ?>" class="btn btn-success" name="modifier" style="display: none;">Modifier</button>
                                        </form>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php
                        }
                        ?>

        
                    
                    <form  method="post"action="./traitement/insertComnt.php"  class="mt-2">
                    <input type="hidden" name="articleid" value="<?php echo $idArticle ?>">
                   <textarea class="form-control w-75" type="text" placeholder="Commentaie..." name="donnecmn" ></textarea>
                    <input class="w-25 mt-2 btn btn-info" name="cmn" type="submit" value="Commentaire">
                    </form>
        
                    </div>        
 </div>
           
           
          
            
          </section>
         



 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script>
    
    function toggleButtonAndEnableInput(id) {
        document.getElementById('inputField'+id).removeAttribute('disabled');
        document.getElementById('toggleButton'+id).style.display = 'none';
        document.getElementById('toggleaff'+id).style.display = 'inline';
        document.getElementById('hiddenButton'+id).style.display = 'inline';
        document.getElementById('hidden'+id).style.display = 'inline';
    }

    function toggleButtonAnddisabled(id) {
        document.getElementById('inputField'+id).setAttribute('disabled', 'true');
        document.getElementById('toggleButton'+id).style.display = 'inline';
        document.getElementById('toggleaff'+id).style.display = 'none';
        document.getElementById('hiddenButton'+id).style.display = 'none';
        document.getElementById('hidden'+id).style.display = 'none';
    }
</script>
<?php include './include/footer2.php' ?>