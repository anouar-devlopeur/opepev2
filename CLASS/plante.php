<?php 
class Plante{
    private $cnx;
    public function __construct($pdo){ 
        $this->cnx = $pdo;
     }
     public function get_plante_total($idUser){
        $totalPrixQuery = "SELECT SUM(prix * quantite) AS totalPrix FROM plantes JOIN panier ON plantes.idPlante = panier.idPlante WHERE panier.idUtl = :idUser";
            $stmtTotalPrix = $this->cnx->prepare($totalPrixQuery);
            $stmtTotalPrix->bindParam(':idUser', $idUser, PDO::PARAM_INT);
           $stmtTotalPrix->execute();
           return $stmtTotalPrix->fetch(PDO::FETCH_ASSOC);
            
    

     }
}