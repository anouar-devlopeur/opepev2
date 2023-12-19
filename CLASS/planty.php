<?php 
class Planty{
  
    private $nomPlante;
    private $imagePlante;
    private $descriptionPlante;
    private $prix;
    private $idCat;
    private $idPlant;
    private $stock;

        public function __construct($idPlant,$nomPlante, $imagePlante, $descriptionPlante, $prix, $idCat, $stock) {
            $this->idPlant = $idPlant;
            $this->nomPlante = $nomPlante;
            $this->imagePlante = $imagePlante;
            $this->descriptionPlante = $descriptionPlante;
            $this->prix = $prix;
            $this->idCat = $idCat;
            $this->stock = $stock;
        }
     
        public function getIdPlante() {
            return $this->idPlant;
        }
    
        // Getter for nomPlante
    public function getNomPlante() {
        return $this->nomPlante;
    }

    // Setter for nomPlante
  

    // Getter for imagePlante
    public function getImagePlante() {
        return $this->imagePlante;
    }


    // Getter for descriptionPlante
    public function getDescriptionPlante() {
        return $this->descriptionPlante;
    }

    // Setter for descriptionPlante
   

    // Getter for prix
    public function getPrix() {
        return $this->prix;
    }



    // Getter for idCat
    public function getIdCat() {
        return $this->idCat;
    }


    // Getter for stock
    public function getStock() {
        return $this->stock;
    }


}