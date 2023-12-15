<?php 
include '../CLASS/cnx.php';
session_start();


if (empty($_SESSION['idUtl'])|| isset($_POST['logout'])) {
    $_SESSION['idUtl'] = "";
    session_destroy();
    header('location: index.php');
    exit();
}


$userId = $_SESSION['idUtl'];


if (isset($_POST["save_data"])) {
//     $idth=$_POST['idth'];
//     echo $idth;
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
//         //   echo "<script>setTimeout(function(){ window.location.href = 'blog.php'; }, 1000);</script>";
//       } else {

//           echo "Erreur de creation : " . mysqli_error($conn);
//       }
//   } 
}