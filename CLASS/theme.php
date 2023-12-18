<?php 
include 'themee.php';
class Theme{
    private $cnx;
    // private $idTh;
    private $nomTh;
    private $descriptionTh;
    private $imageTh;
    public function __construct(){ 
      $db=new Connection();
      $this->cnx = $db->getConnection();
     }
    //  public function setIdTh($idTh) {
    //     $this->idTh = $idTh;
    // }

    public function setNomTh($nomTh) {
        $this->nomTh = $nomTh;
    }

    public function setDescriptionTh($descriptionTh) {
        $this->descriptionTh = $descriptionTh;
    }

    public function setImageTh($imageTh) {
        $this->imageTh = $imageTh;
    }
     public function get_theme(){
        $selectThemesQuery = "SELECT * FROM themes";
        $themesResult = $this->cnx->query($selectThemesQuery);
            $themes = $themesResult->fetchAll(PDO::FETCH_ASSOC);
            $theme=array();
            foreach($themes as $theme){
                $th[]=new Themee($theme['idTh'],$theme['nomTh'],$theme['descriptionTh'],$theme['imageTh']) ;
            }
           return $th;
           
            // die(json_encode($theme));

        
     }
     public function article_by_idth($idth){
        $reqarticle = "SELECT idAr, nomAr, SUBSTRING(descriptionAr, 1, 60) as disc, imageAr, dateAr FROM articles WHERE idTh = $idth LIMIT 10";
        $stmt = $this->cnx->query($reqarticle);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public function ThemeIdth($idth){
        $query = "SELECT `idTh`, `nomTh`, `descriptionTh`, `imageTh` FROM `themes` where idth =:idTh";
        $stmt = $this->cnx->prepare($query);
        $stmt->bindParam(':idTh', $idth, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        $themes=array();
        if($res){
            $themes=new Themee($res['idTh'],$res['nomTh'],$res['descriptionTh'],$res['imageTh']);
        }
        
       return $themes;
        
    }
    
    
     public function CountTheme(){
      $query = "SELECT COUNT(*) as totalCat FROM themes";
      $stmt = $this->cnx->prepare($query);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
       return $result;
    }
    public function InsertTheme(){
        $req='INSERT INTO `themes`(`nomTh`, `descriptionTh`, `imageTh`) VALUES
         (:nomTh,:descriptionTh,:imageTh)';
         $stmt = $this->cnx->prepare($req);
         $stmt->bindParam(':nomTh',$this->nomTh, PDO::PARAM_STR);
         $stmt->bindParam(':descriptionTh', $this->descriptionTh, PDO::PARAM_STR);
         $stmt->bindParam(':imageTh', $this->imageTh, PDO::PARAM_STR);
         $stmt->execute();
    }  
    public function delelt($idt){
        $dellete='DELETE FROM `themes` WHERE idTh= :id';
        $stmt = $this->cnx->prepare($dellete);
        $stmt->bindParam(':id', $idt, PDO::PARAM_INT);
       $res= $stmt->execute();
       return $res;
    }  
    public function UpdateTheme($id){
        $req = 'UPDATE `themes` SET `nomTh` = :nom, `descriptionTh` = :dsc, `imageTh` = :img WHERE idTh = :id';
        $stmt = $this->cnx->prepare($req);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nom', $this->nomTh, PDO::PARAM_STR);
        $stmt->bindParam(':dsc', $this->descriptionTh, PDO::PARAM_STR);
        $stmt->bindParam(':img', $this->imageTh, PDO::PARAM_STR);
        $res = $stmt->execute();
        return $res;
    }
    

}