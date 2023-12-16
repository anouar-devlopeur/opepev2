<?php 
class Commentaire{
    private $cnx;
    private $contenuCom;
    private $idUtl;
    private $idAr;
     private $status;
     public function __construct() {
        $db=new Connection();
        $this->cnx = $db->getConnection();
     }
     public function getContenuCom() {
        return $this->contenuCom;
    }

    // Setter for $contenuCom
    public function setContenuCom($contenuCom) {
        $this->contenuCom = $contenuCom;
    }

    // Getter for $idUtl
    public function getIdUtl() {
        return $this->idUtl;
    }

    // Setter for $idUtl
    public function setIdUtl($idUtl) {
        $this->idUtl = $idUtl;
    }

    // Getter for $idAr
    public function getIdAr() {
        return $this->idAr;
    }

    // Setter for $idAr
    public function setIdAr($idAr) {
        $this->idAr = $idAr;
    }

    // Getter for $status
    public function getStatus() {
        return $this->status;
    }

    // Setter for $status
    public function setStatus($status) {
        $this->status = $status;
    }
    public function insertContenuCom() {
        $query = "INSERT INTO commentaire (contenuCom, idUtl, idAr, status) VALUES (:contenuCom, :idUtl, :idAr, 1)";
        $stmt = $this->cnx->prepare($query);
        $stmt->bindParam(':contenuCom', $this->contenuCom, PDO::PARAM_STR);
        $stmt->bindParam(':idUtl', $this->idUtl, PDO::PARAM_INT);
        $stmt->bindParam(':idAr', $this->idAr, PDO::PARAM_INT);
       
        $result = $stmt->execute();
        return $result;
    }
    public function get_ContenuCom($idAr) {
        $query = "SELECT c.idCom, c.contenuCom,u.prenomUtl,u.nomUtl,u.idUtl,u.emailUtl 
        FROM commentaire c
        , utilisateurs u where c.idUtl = u.idUtl and c.idAr=:idAr";

            $stmt = $this->cnx->prepare($query);
            $stmt->bindParam(':idAr', $idAr, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
    }
    public function deleteContenuCom($idcmn) {
        $query = 'DELETE FROM commentaire WHERE idCom = :idcmn';
        $stmt = $this->cnx->prepare($query);
        $stmt->bindParam(':idcmn', $idcmn, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }
    public function updateCmn($idcmn) {
        $updateQuery = "UPDATE commentaire SET contenuCom = :contenuCom WHERE idCom = :idCom";
        $stmt = $this->cnx->prepare($updateQuery);
        $stmt->bindParam(':contenuCom', $this->contenuCom);
        $stmt->bindParam(':idCom', $idcmn); 
        $stmt->execute();
        return $stmt;
    }
    
}