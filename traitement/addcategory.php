<?php
include '../CLASS/Connection.php';
include '../CLASS/categorie.php';
include '../CLASS/catergory.php';
$cat = new Categorie();
if (isset($_POST['submit'])) {
    $Name = $_POST['cat'];
    $cat->setNomCat($Name);
    $cat->AddCategorie();
}
header('Location: ../adminCat.php ');
