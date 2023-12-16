<?php
include '../CLASS/Connection.php';
include '../CLASS/commentaire.php';



session_start();
$idUtl=$_SESSION['idUtl'];


if(isset($_POST['cmn'])){
    $idart= $_POST['articleid']; 
    $comnt=new Commentaire();
    $comnt->setContenuCom($_POST['donnecmn']);
    $comnt->setIdUtl($idUtl);
    $comnt->setIdAr($idart);
    $res=$comnt->insertContenuCom();
    if($res){
        header("Location: ../oneArticle.php?id=" . $idart);
    }

}
?>