<?php
include '../CLASS/Connection.php';
include '../CLASS/commentaire.php';
$cmnt = new Commentaire();

if (isset($_GET['idCom']) && isset($_GET['idArticle'])) {
    $id = $_GET['idCom'];
    $idart = $_GET['idArticle'];

    $res = $cmnt->deleteContenuCom($id);
    if ($res) {
        header("Location: ../oneArticle.php?id=" . $idart);
        exit();
    }
}


?>
