<?php 
include './CLASS/planty.php';
class Plante{
    private $cnx;
    private $nomPlante;
    private $imagePlante;
    private $descriptionPlante;
    private $prix;
    private $idCat;
    private $stock;

    public function __construct(){ 
      $db=new Connection();
      $this->cnx = $db->getConnection();
     }
  
 
    // Setter for nomPlante
    public function setNomPlante($nomPlante) {
        $this->nomPlante = $nomPlante;
    }


 

    // Setter for imagePlante
    public function setImagePlante($imagePlante) {
        $this->imagePlante = $imagePlante;
    }

  
    // Setter for descriptionPlante
    public function setDescriptionPlante($descriptionPlante) {
        $this->descriptionPlante = $descriptionPlante;
    }



    // Setter for prix
    public function setPrix($prix) {
        $this->prix = $prix;
    }

 
  

    // Setter for idCat
    public function setIdCat($idCat) {
        $this->idCat = $idCat;
    }

  
 

    // Setter for stock
    public function setStock($stock) {
        $this->stock = $stock;
    }
    public function insertPlante(){
        $insert = "INSERT INTO plantes (nomplante, imagePlante, descriptionPlante,stock, prix, idCategorie) VALUES (?, ?, ?,1, ?, ?)";
        $stmt = $this->cnx->prepare($insert);
        $stmt->bindValue(1, $this->nomPlante, PDO::PARAM_STR);
        $stmt->bindValue(2, $this->imagePlante, PDO::PARAM_STR);
        $stmt->bindValue(3, $this->descriptionPlante, PDO::PARAM_STR); 
        $stmt->bindValue(4, $this->prix, PDO::PARAM_INT);
        $stmt->bindValue(5, $this->idCat, PDO::PARAM_INT);
        
        $res = $stmt->execute();
        return $res;
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
    public function get_plant(){
        $query = "SELECT * FROM plantes";
        $stmt = $this->cnx->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pla=array();
        foreach($result as $row) {
            //`idPlante`, `nomPlante`, `imagePlante`, `descriptionPlante`, `stock`, `prix`, `idCategorie`
            $pla[]=new Planty($row['idPlante'],$row['nomPlante'],$row['imagePlante'],$row['descriptionPlante'],$row['prix'],$row['idCategorie'],$row['stock']);

        }
        return $pla;

    }
    public function get_plantid($idPlant) {
        $query = "SELECT * FROM plantes WHERE idPlante = :id";
        $stmt = $this->cnx->prepare($query);
        $stmt->bindValue(':id', $idPlant, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function dellet_plante($id){
        $dellete='DELETE FROM `plantes` WHERE idPlante= :id';
        $stmt = $this->cnx->prepare($dellete);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       $res= $stmt->execute();
       return $res;
    }
    public function update_plante($id) {
        $query = 'UPDATE `plantes` SET `nomPlante`=:nom, `imagePlante`=:img, `descriptionPlante`=:descriptionPlante, `stock`=:stock, `prix`=:prix, `idCategorie`=:idcat WHERE idPlante = :id';
    
        $stmt = $this->cnx->prepare($query);
    
        $stmt->bindValue(':nom', $this->nomPlante, PDO::PARAM_STR);
        $stmt->bindValue(':img', $this->imagePlante, PDO::PARAM_STR);
        $stmt->bindValue(':descriptionPlante', $this->descriptionPlante, PDO::PARAM_STR);
        $stmt->bindValue(':stock', $this->stock, PDO::PARAM_INT);
        $stmt->bindValue(':prix', $this->prix, PDO::PARAM_INT);
        $stmt->bindValue(':idcat', $this->idCat, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
        $res = $stmt->execute();
    
        return $res;
    }
}