
<?php 
include './CLASS/cnx.php';
session_start();
$userId = $_SESSION['idUtl'];

// if (isset($_POST['commander'])) {
//     $result=$Pannier->affichePannier($userId);
//      if ($result) {
//    $res=$Commande->getCommande($userId);
//    if($res){

//    }

//     }else{  
//          echo "<script>alert('Erreur lors de la validation de la commande')</script>";

//     }
   

    // if ($resultCommande) {
    //     // Utilisation de LAST_INSERT_ID() pour récupérer l'ID de la dernière commande insérée
    //     $requeteDetailsCommande = "INSERT INTO details_commande (idCommande, idPlante, quantite) 
    //                                SELECT LAST_INSERT_ID(), idPlante, quantite FROM panier WHERE idUtl = $idUser";
    //     $resultDetailsCommande = $conn->query($requeteDetailsCommande);

    //     $requeteSuppressionPanier = "DELETE FROM panier WHERE idUtl = $idUser";
    //     $resultSuppressionPanier = $conn->query($requeteSuppressionPanier);

    //     echo "<script>alert('Commande validée avec succès')</script>";
    //     header("Location: client.php");
    //     exit();
    // } else {
    // }
// }
include './include/header.php' ?>


 <body style="background-color: #132A13;"> 
 
<section class="h-100" >
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Cart - Item </h5><?php 
                 $result=$Pannier->affichePannier($userId);   
           ?>
          </div>
          <div class="card-body">
            <?php
          foreach ($result as $row) {
                // Vous devrez remplacer cette partie avec les données de votre base de données
                $productName = $row['nomPlante'] ; // Remplacez par le nom de votre produit
                $productDescription = $row['descriptionPlante']; // Remplacez par la couleur de votre produit
                $productStock = $row['stock']; // Remplacez par la taille de votre produit
                $productPrice =$row['prix']; // Remplacez par le prix de votre produit
                $imagePlante = $row['imagePlante'];
                $idPanier = $row['idPanier'];
                ?>
                <!-- Single item -->
                <div class="row">
                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                        <!-- Image -->
                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                            <img src="<?php echo $imagePlante ?>"
                                class="w-100" alt="<?php echo  $productName; ?>" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                            </a>
                        </div>
                        <!-- Image -->
                    </div>

                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                        <!-- Data -->
                        <p><strong><?php echo $productName; ?></strong></p>
                        <p><span style="color: green"> Description:</span> <?php echo $productDescription; ?></p>
                        <p><span style="color: green">Stock:</span> <?php echo $productStock; ?></p>

                        <!-- Data -->
                    </div>
                    

                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">

                        <!-- Price -->
                        <p class="text-start text-md-center">
                            <strong><?php echo $productPrice; ?>DH</strong>
                        </p>
                        
                        <!-- Price -->
                        <div class="d-flex" style="gap:10px">
                        <form method="POST"  action="traitement/supppanier.php">
                          <input type="hidden" name="idPanier" value="<?php echo $idPanier; ?>">
                          
                          <button type="submit" name="supprimerPanier" class="btn" style="color:white; background-color: red; width:100px; height:40px">Supprimer</button>
                        </form> 
                        </div>
                    </div>
                    
                </div>
                <!-- Single item -->
                
                <p>----------------------------------------------------------------------------------------------------------</p>
            <?php } ?> 
            <hr class="my-4" />  
            <!-- ... (Le reste de votre contenu) ... -->
          </div>
       
        </div>
      </div>
      <div class="col-md-4">
      <?php
      // Calcul du prix total des produits dans le panier

    
    $totalPrixResult=$Plante->get_plante_total($userId);

      $totalPrix = $totalPrixResult['totalPrix'];
    //    echo ''.$totalPrix.'<br>';
      // Calcul de la TVA 
      $tva = $totalPrix * 0.2;
      // Calcul du prix total avec TVA
      $prixTotalAvecTVA = $totalPrix + $tva;
      ?>


      <div class="card mb-4">
          <div class="card-header py-3">
              <h5 class="mb-0">Récapitulatif de la commande</h5>
          </div>
          <div class="card-body">
              <p><strong> Prix total des produits:</strong> <?php echo $totalPrix; ?> DH</p>
              <p><strong> TVA (20%):</strong>
             <?php echo $tva; ?> 
                DH</p>
              <p><strong>Prix total avec TVA:</strong> 
            <?php echo $prixTotalAvecTVA; ?> 
               DH</p>
              <form method="POST" action="traitement/commandeprod.php" class="d-flex justify-content-center">
           <input type="hidden" name="idPanier" value="<?php echo $idPanier; ?>">
            <button type="submit" name="commander" class="btn" style="color:white; background-color: green; width:150px; height:40px; margin-top:10px">Commander</button>
          </form>
          <a  href="client.php" class=" btn btn-info">CLient</a>
          </div>

      </div>
      </div>
    </div>
  </div>

</section>

<?php include './include/footer.php' ?>