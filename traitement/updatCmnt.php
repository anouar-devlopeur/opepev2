<?php 
include '../CLASS/Connection.php';
include '../CLASS/commentaire.php';

$cmnt = new Commentaire();
$cmnnt=$_POST['comntaire'];

if (isset($_POST['modifier'])) {

    $id = $_POST['comment_id'];
    $idart = $_POST['Article_id'];
    $comntaire = $_POST['comntaire'];
    $cmnt->setContenuCom($comntaire);

    $res = $cmnt->updateCmn($id);

    if ($res) {
        header("Location: ../oneArticle.php?id=" . $idart);
        exit();
    } else {
        echo "Failed to update the comment.";
    }
}


