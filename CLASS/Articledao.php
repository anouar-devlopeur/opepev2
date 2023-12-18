<?php 
class Article{
    
    private $idArt;
    private $name;
    private $desc;
    private $upload_path;
    private $date;
    private $idUser;

    private $idth;
    private $tags;

    // public function __construct() {}

    public function __construct($idArt,$name, $desc, $upload_path, $date, $idUser, $idth, $tags) {
        $this->idArt = $idArt;
        $this->name = $name;
        $this->desc = $desc;
        $this->upload_path = $upload_path;
        $this->date = $date;
        $this->idUser = $idUser;
        $this->idth = $idth;
        $this->tags = $tags;
    }

    public function getIdart() {
        return $this->idArt;
    }
    // Getter and setter for $name
      public function getName() {
        return $this->name;
    }

  

    // Getter and setter for $desc
    public function getDesc() {
        return $this->desc;
    }

  

    // Getter and setter for $upload_path
    public function getUploadPath() {
        return $this->upload_path;
    }

   

    // Getter and setter for $date
    public function getDate() {
        return $this->date;
    }

   

    // Getter and setter for $idUser
    public function getIdUser() {
        return $this->idUser;
    }


    // Getter and setter for $idth
    public function getIdth() {
        return $this->idth;
    }

  

    // Getter and setter for $tags
    public function getTags() {
        return $this->tags;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDesc($desc) {
        $this->desc = $desc;
    }


    public function setUploadPath($upload_path) {
        $this->upload_path = $upload_path;
    }

    // Getter and setter for $date
   

    public function setDate($date) {
        $this->date = $date;
    }

  

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    // Getter and setter for $idth
  
    public function setIdth($idth) {
        $this->idth = $idth;
    }

    // Getter and setter for $tags
 

    public function setTags($tags) {
        $this->tags = $tags;
    }
}