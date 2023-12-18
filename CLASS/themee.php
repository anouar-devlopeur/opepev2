<?php 
class Themee {
    private $idTh;
    private $nomTh;
    private $descriptionTh;
    private $imageTh;

    // Constructeur
    public function __construct($idTh, $nomTh, $descriptionTh, $imageTh) {
        $this->idTh = $idTh;
        $this->nomTh = $nomTh;
        $this->descriptionTh = $descriptionTh;
        $this->imageTh = $imageTh;
    }

    // Méthodes getters
    public function getIdTh() {
        return $this->idTh;
    }

    public function getNomTh() {
        return $this->nomTh;
    }

    public function getDescriptionTh() {
        return $this->descriptionTh;
    }

    public function getImageTh() {
        return $this->imageTh;
    }

    // Méthodes setters
  
}
