<?php 
class Pannier{
    private $cnx;
    public function __construct($pdo){
        $this->cnx = $pdo;
    }
    public function InsertPannier($idUtl, $idPlante) {
        $sql = "INSERT INTO panier(idUtl, idPlante, quantite) VALUES (?, ?, 1)";
        $res = $this->cnx->prepare($sql);
        $res->bindParam(1, $idUtl, PDO::PARAM_INT);
        $res->bindParam(2, $idPlante, PDO::PARAM_INT);
    
        $res->execute();
    
        return true;
    }
    public function affichePannier($idUtl) {
              $reqet="SELECT * FROM panier JOIN plantes ON panier.idPlante = plantes.idPlante WHERE idUtl= :userId";
          $rest = $this->cnx->prepare($reqet);
          $rest->bindParam(':userId', $idUtl, PDO::PARAM_INT);
          $rest->execute();
          return $rest->fetchAll(PDO::FETCH_ASSOC);
        
    }
    public function deletePannier($idpannier) {
        $query = "DELETE FROM panier WHERE idPanier = :idpannier";
        $res = $this->cnx->prepare($query);
        $res->bindParam(':idpannier', $idpannier, PDO::PARAM_INT);
        $res->execute();

    }
    public function deletePannieruser($idUser) {
        $query = "DELETE FROM panier WHERE idUtl  = :idUser";
        $res = $this->cnx->prepare($query);
        $res->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $res->execute();

    }
    
}
?>