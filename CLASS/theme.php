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
        
        

     }
     public function CountTheme(){
      $query = "SELECT COUNT(*) as totalCat FROM themes";
      $stmt = $this->cnx->prepare($query);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
       return $result;
    }

}