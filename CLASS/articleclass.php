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
}