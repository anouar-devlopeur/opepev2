<?php  
session_start(); 
if (empty($_SESSION['prenomUtl'])|| isset($_POST['logout'])) {
    $_SESSION['prenomUtl'] = "";
    session_destroy();
    header('location: ./index.php');
    exit();
}
// include './CLASS/Connection.php';
?>
<div class="bg-sidebar vh-100 w-50 position-fixed">
            <div class="log d-flex justify-content-between">
                <h1 class="E-classe text-start ms-3 ps-1 mt-3 h6 fw-bold">OP<em>EP</em></h1>
                <i class="far fa-times h4 me-3 close align-self-end d-md-none"></i>
            </div>
            <div class="img-admin d-flex flex-column align-items-center text-center gap-2">
                <img class="rounded-circle" src="./img/admin.jpg" alt="img-admin" height="120" width="120">
                <h2 class="h6 fw-bold">
                <?php echo $_SESSION['prenomUtl']; ?> 
                </h2>
                <span class="h7 admin-color">admin</span>
            </div>
            <div class=" bg-list d-flex flex-column   fw-bold gap-2 mt-4 w-100 ">
                <ul class="d-flex flex-column list-unstyled">
                        <li class="h7"><a class="nav-link text-dark" href="./admin.php">
                             <span class="text-white text-uppercase fs-4">Home</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="adminCat.php">
                         <span class="text-white text-uppercase fs-4">categorie</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="adminPlant.php">
                         <span class="text-white text-uppercase fs-4">plante</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="theme.php">
                         <span class="text-white text-uppercase fs-4">Theme</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="aricledash.php">
                         <span class="text-white text-uppercase fs-4">Article</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="tagsdash.php">
                         <span class="text-white text-uppercase fs-4">Tags</span></a></li>
                </ul>
                <form  method="post" >
                <ul class="logout d-flex justify-content-start list-unstyled">
                    <li class="w-100 fs-3  "><button type="submit" class="nav-link text-dark border-0 ms-5" name="logout" ><span>Logout</span><i
                                class="fal fa-sign-out-alt ms-2"></i></button></li>
                </ul>
                </form>
            </div>

        </div>