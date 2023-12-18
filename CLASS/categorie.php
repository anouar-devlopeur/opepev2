<?php 
include_once './CLASS/catergory.php';
class Categorie{
    private $cnx;
    private $nomCat;
   

 

    public function __construct() {
        $djd = new Connection();
        $this->cnx = $djd->getConnection();

        
    }
    // public function getIdcat() {
    //     return $this->idcat;
    // }

    // // Setter pour $nomCat
    // public function setIdcat($idCat) {
    //     $this->idcat=$idCat;
    // }
    //     // Getter pour $nomCat
    //     public function getNomCat() {
    //         return $this->nomCat;
    //     }
    
    //     // Setter pour $nomCat
    //     public function setNomCat($nomCat) {
    //         $this->nomCat = $nomCat;
    //     }
    public function getCategorie() {
        $qery=$this->cnx->query("SELECT DISTINCT idCategorie, nomCategorie FROM categories");
       $categ=$qery->fetchAll(PDO::FETCH_ASSOC);
       $cat=array();
       foreach($categ as $row){
        $cat[]=new Catergory($row['idCategorie'],$row['nomCategorie']);
       }
        return $cat;
    }
    public function CountCategorie(){
        $query = "SELECT COUNT(*) as totalCat FROM categories";
        $stmt = $this->cnx->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
         return $result;
      }
      public function GetCat() {
        $query = "SELECT  * FROM categories";
        $stmt = $this->cnx->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $cat=array();
        foreach($result as $row) {
            $cat[]=new Catergory($row['idCategorie'],$row['nomCategorie']);

        }
    return $cat;
     
       
    }
    public function AddCategorie() {
        $req = 'INSERT INTO categories (nomCategorie) VALUES (:cat)';
        $stmt = $this->cnx->prepare($req);
        $stmt->bindParam(':cat', $this->nomCat, PDO::PARAM_STR);
        $stmt->execute();
        
    }
    public function UpCategorie($id) {
        $req = 'UPDATE `categories` SET `nomCategorie` = :nom WHERE `idCategorie` = :id';
        $stmt = $this->cnx->prepare($req);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nom', $this->nomCat); 
        $res=$stmt->execute();
        return $res;
    
   
    }
    
    public function DeleteCategorie($id) {
        $dellete='DELETE FROM `categories` WHERE idCategorie= :id';
        $stmt = $this->cnx->prepare($dellete);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       $res= $stmt->execute();
       return $res;
    }

    public function setNomCat($name)
    {
        $this->nomCat = $name;
    }
    
}