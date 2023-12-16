<?php 
class Tags{
    private $cnx;
    public function __construct(){
  $db=new Connection();
  $this->cnx = $db->getConnection();
    }
    public function get_tag($idth){
        $req="SELECT nomTag
        FROM tags tg
        JOIN tags_theme tgh ON tg.idTag = tgh.idTag
        JOIN themes th ON th.idTh = tgh.idTh
        WHERE th.idTh = :idth";
        $stmt = $this->cnx->prepare($req);
        $stmt->bindParam(':idth', $idth, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
      return $result;

    }
}