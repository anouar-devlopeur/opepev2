<?php 
class Theme{
    private $cnx;
    public function __construct(){ 
      $db=new Connection();
      $this->cnx = $db->getConnection();
     }
     public function get_theme(){
        $selectThemesQuery = "SELECT * FROM themes";
        $themesResult = $this->cnx->query($selectThemesQuery);
            $themes = $themesResult->fetchAll(PDO::FETCH_ASSOC);
            return $themes;
        
     }
     public function article_by_idth($idth){
        $reqarticle = "SELECT idAr, nomAr, SUBSTRING(descriptionAr, 1, 60)as disc, imageAr, dateAr FROM articles WHERE idTh = $idth LIMIT 10";
            $stmt =$this->cnx->query($reqarticle);
               return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        ;
        

     }

}