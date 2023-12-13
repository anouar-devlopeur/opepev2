<?php
class client{
    private $cnx;
    public function __construct($pdo){
        $this->cnx = $pdo;
    }
    public function countplant($iduser){ 
        $reqet="SELECT * FROM panier JOIN plantes ON panier.idPlante = plantes.idPlante WHERE idUtl= $iduser";
        $result2 = $this->cnx->query($reqet);
        if ($result2 !== false) {
            $count = $result2->rowCount();
            return $count;
        }
    }
    public function plantesQuery($sql){
        $res=$this->cnx->query($sql);
        if ($res !== false) {
            return $res;
        }

    }
    public function pagination(){
         $result = "SELECT COUNT(idPlante) AS total FROM plantes";
         $res = $this->cnx->query($result); 
         $rest =$res->fetch(PDO::FETCH_ASSOC);
    
        return $rest;
      
    }
}
?>