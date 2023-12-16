<?php 
class Categorie{
    private $cnx;
    public function __construct() {
        $djd = new Connection();
        $this->cnx = $djd->getConnection();
    }
    public function getCategorie() {
        $qery=$this->cnx->query("SELECT DISTINCT idCategorie, nomCategorie FROM categories");
       $categ=$qery->fetchAll(PDO::FETCH_ASSOC);
        return $categ;
    }
}