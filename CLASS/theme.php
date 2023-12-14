<?php 
class Theme{
    private $cnx;
    public function __construct($pdo){ 
        $this->cnx = $pdo;
     }
     public function get_theme(){
        $selectThemesQuery = "SELECT * FROM themes";
        $themesResult = $this->cnx->query($selectThemesQuery);
            $themes = $themesResult->fetchAll(PDO::FETCH_ASSOC);
            return $themes;
        
     }

}