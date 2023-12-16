<?php 
class Pannier{
    private $cnx;
    private $idUtl;
    private$idPlante;

    public function __construct(){
        $djd = new Connection();
        $this->cnx = $djd->getConnection();
    }
        // Getter for $idUtl
        public function getIdUtl() {
            return $this->idUtl;
        }
    
        // Setter for $idUtl
        public function setIdUtl($idUtl) {
            $this->idUtl = $idUtl;
        }
    
        // Getter for $idPlante
        public function getIdPlante() {
            return $this->idPlante;
        }
    
        // Setter for $idPlante
        public function setIdPlante($idPlante) {
            $this->idPlante = $idPlante;
        }
    public function InsertPannier() {
        $sql = "INSERT INTO panier(idUtl, idPlante, quantite) VALUES (?, ?, 1)";
        $res = $this->cnx->prepare($sql);
        $res->bindParam(1, $this->idUtl, PDO::PARAM_INT);
        $res->bindParam(2, $this->idPlante, PDO::PARAM_INT);

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