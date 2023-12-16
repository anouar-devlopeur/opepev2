<?php 
class Commande{
    private $cnx;
    private $idUser;
    private $idCommande;
    private $idPlante;
    private $quantite;
    public function __construct(){
       $db=new Connection();
       $this->cnx=$db->getConnection();
    }
       // Getter for $idUser
       public function getIdUser() {
        return $this->idUser;
    }

    // Setter for $idUser
    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    // Getter for $idCommande
    public function getIdCommande() {
        return $this->idCommande;
    }

    // Setter for $idCommande
    public function setIdCommande($idCommande) {
        $this->idCommande = $idCommande;
    }

    // Getter for $idPlante
    public function getIdPlante() {
        return $this->idPlante;
    }

    // Setter for $idPlante
    public function setIdPlante($idPlante) {
        $this->idPlante = $idPlante;
    }

    // Getter for $quantite
    public function getQuantite() {
        return $this->quantite;
    }

    // Setter for $quantite
    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }
  public function getCommande(){
      $requeteCommande = "INSERT INTO commandes (idUtl) VALUES (:idUser)";
      $resultCommande = $this->cnx->prepare($requeteCommande);
      $resultCommande->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);

      return $resultCommande->execute();

    
  }
  
  public function details_commande($idUser){
        $this->setIdUser($idUser);
        $this->getCommande();
        $idCommande = $this->cnx->lastInsertId();
    
        // Insert into details_commande using parameterized query
        $requeteDetailsCommande = "INSERT INTO details_commande (idCommande, idPlante, quantite) 
          SELECT :idCommande, idPlante, quantite FROM panier WHERE idUtl = :idUser";
        $resultDetailsCommande = $this->cnx->prepare($requeteDetailsCommande);
        $resultDetailsCommande->bindParam(':idCommande', $idCommande, PDO::PARAM_INT);
        $resultDetailsCommande->bindParam(':idUser', $idUser, PDO::PARAM_INT);
    
        return $resultDetailsCommande->execute();
  }

}