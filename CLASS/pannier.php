<?php 
require_once("plante.php");
class Pannier{
    private $cnx;
    private $idUtl;
    private $idP;
    private $idPlante;
    private Plante $plante;

    public function __construct(){
        $db=new Connection();
      $this->cnx = $db->getConnection();
        $this->plante = new Plante();
    }

    /**
     * Get the value of plante
     */ 
    public function getPlante()
    {
        return $this->plante;
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
    public function affichePannier(Pannier $panier) {
        $idUtl = $panier->getIdUtl();
              $reqet="SELECT * FROM panier JOIN plantes ON panier.idPlante = plantes.idPlante WHERE idUtl= :userId";
          $rest = $this->cnx->prepare($reqet);
          $rest->bindParam(':userId', $idUtl, PDO::PARAM_INT);
          $rest->execute();
          $plants = array();
          while($row = $rest->fetch(PDO::FETCH_ASSOC)) {
            $plante = new Pannier();
            $plante->setIdP($row['idPanier']);
            $plante->getPlante()->setNomPlante($row['nomPlante']);
            $plante->getPlante()->setImagePlante($row['imagePlante']);
            $plante->getPlante()->setDescriptionPlante($row['descriptionPlante']);
            $plante->getPlante()->setPrix($row['prix']);
            $plante->getPlante()->setStock($row['stock']);
            array_push($plants, $plante);
          } 
          
          return $plants;
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
    

    

    /**
     * Get the value of idP
     */ 
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * Set the value of idP
     *
     * @return  self
     */ 
    public function setIdP($idP)
    {
        $this->idP = $idP;

        return $this;
    }
}
?>