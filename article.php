<?php 
include './CLASS/cnx.php';
session_start();
$userId = $_SESSION['idUtl'];

if (empty($_SESSION['idUtl'])|| isset($_POST['logout'])) {
    $_SESSION['idUtl'] = "";
    session_destroy();
    header('location: index.php');
    exit();
}

include 'include/heder2.php';
?>



<?php  
include 'include/footer2.php';
?>