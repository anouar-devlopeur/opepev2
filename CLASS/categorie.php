<?php 
class Categorie{
    private $cnx;
    public function __construct($pdo) {
        $this->cnx = $pdo;
    }
    public function getCategorie() {
        $qery=$this->cnx->query("SELECT DISTINCT idCategorie, nomCategorie FROM categories");
       $categ=$qery->fetchAll(PDO::FETCH_ASSOC);
        return $categ;
    }
}