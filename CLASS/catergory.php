<?php 
class Catergory{
    
    private $idcat;
    private $nomCat;
       // Getter pour $idcat
       public function __construct($idcat, $nomCat)
       {
           $this->idcat = $idcat;
           $this->nomCat = $nomCat;
       }
   
       public function getIdcat() {
        return $this->idcat;
    }

    // Setter pour $idcat
    public function setIdcat($idcat) {
        $this->idcat = $idcat;
    }

    // Getter pour $nomCat
    public function getNomCat() {
        return $this->nomCat;
    }

    // Setter pour $nomCat
    public function setNomCat($nomCat) {
        $this->nomCat = $nomCat;
    }
}