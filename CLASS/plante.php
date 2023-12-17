<?php 
class Plante{
    private $cnx;
    public function __construct(){ 
      $db=new Connection();
      $this->cnx = $db->getConnection();
     }
     public function get_plante_total($idUser){
        $totalPrixQuery = "SELECT SUM(prix * quantite) AS totalPrix FROM plantes JOIN panier ON plantes.idPlante = panier.idPlante WHERE panier.idUtl = :idUser";
            $stmtTotalPrix = $this->cnx->prepare($totalPrixQuery);
            $stmtTotalPrix->bindParam(':idUser', $idUser, PDO::PARAM_INT);
           $stmtTotalPrix->execute();
           return $stmtTotalPrix->fetch(PDO::FETCH_ASSOC);
            
    

     }
     public function CountPlant(){
      $query = "SELECT COUNT(*) as totalplant FROM plantes";
      $stmt = $this->cnx->prepare($query);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
       return $result;
    }
}