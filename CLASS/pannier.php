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
    
}
?>