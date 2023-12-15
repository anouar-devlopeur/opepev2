<?php 
class Articleclass{
    private $cnx;

    public function __construct($pdo){
        $this->cnx = $pdo;
    }
    public function insertarticle($name,$desc,$upload_path,$date,$idUser,$idth,$tags){
        $stmt = $this->cnx->prepare("INSERT INTO articles (nomAr, descriptionAr, imageAr, dateAr, idUtl, idTh, tagsAr) VALUES (:name, :desc, :upload_path, :date, :idUser, :idth, :tags)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':desc', $desc, PDO::PARAM_STR);
        $stmt->bindParam(':upload_path', $upload_path, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':idth', $idth, PDO::PARAM_INT);
        $stmt->bindParam(':tags', $tags, PDO::PARAM_STR);
      return  $stmt->execute();
   
    }
    public function pagination($idth){
        $sql = "SELECT COUNT(idAr) as totalarticle FROM articles WHERE idTh = :idth";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindParam(':idth', $idth, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $pagination = $row['totalarticle'];
        return $pagination;
     
 
    }
    public function Affpagination($idTh,$offset){
        $sql = "SELECT * FROM articles WHERE idTh = :theme LIMIT :offset, 6";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindParam(':theme', $idTh, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;

    }
}