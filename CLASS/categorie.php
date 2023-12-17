<?php 
class Categorie{
    private $cnx;
    private $nomCat;


    public function __construct() {
        $djd = new Connection();
        $this->cnx = $djd->getConnection();
        

    }
        // Getter pour $nomCat
        public function getNomCat() {
            return $this->nomCat;
        }
    
        // Setter pour $nomCat
        public function setNomCat($nomCat) {
            $this->nomCat = $nomCat;
        }
    public function getCategorie() {
        $qery=$this->cnx->query("SELECT DISTINCT idCategorie, nomCategorie FROM categories");
       $categ=$qery->fetchAll(PDO::FETCH_ASSOC);
        return $categ;
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
        return $result;
     
       
    }
    
}