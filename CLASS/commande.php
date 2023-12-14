<?php 
class Commande{
    private $cnx;
    public function __construct($pdo){
        $this->cnx = $pdo;
    }
  public function getCommande($idUser){
      $requeteCommande = "INSERT INTO commandes (idUtl) VALUES ($idUser)";
     $resultCommande = $this->cnx->prepare($requeteCommande);
   return  $resultCommande->execute();
    
  }
  
  public function details_commande($idUser){
      // Utilisation de LAST_INSERT_ID() pour récupérer l'ID de la dernière commande insérée
      $requeteDetailsCommande = "INSERT INTO details_commande (idCommande, idPlante, quantite) 
      SELECT LAST_INSERT_ID(), idPlante, quantite FROM panier WHERE idUtl = $idUser";
            $resultDetailsCommande = $this->cnx->prepare($requeteDetailsCommande);
        return $resultDetailsCommande->execute();
  }

}