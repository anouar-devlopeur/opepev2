<?php 

session_start();
if (isset($_SESSION["idUtl"]) ){
    $userId= $_SESSION["idUtl"];
    echo"".$userId."";

}

?>