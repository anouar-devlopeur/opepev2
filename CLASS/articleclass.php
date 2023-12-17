<?php 
class Articleclass{
    private $cnx;
private $name;
private $desc;
private $upload_path;
private $date;
private $idUser;

private $idth;
private $tags;

    public function __construct(){
        $db=new Connection();
        $this->cnx = $db->getConnection();
    }
      // Getter and setter for $name
      public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    // Getter and setter for $desc
    public function getDesc() {
        return $this->desc;
    }

    public function setDesc($desc) {
        $this->desc = $desc;
    }

    // Getter and setter for $upload_path
    public function getUploadPath() {
        return $this->upload_path;
    }

    public function setUploadPath($upload_path) {
        $this->upload_path = $upload_path;
    }

    // Getter and setter for $date
    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    // Getter and setter for $idUser
    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    // Getter and setter for $idth
    public function getIdth() {
        return $this->idth;
    }

    public function setIdth($idth) {
        $this->idth = $idth;
    }

    // Getter and setter for $tags
    public function getTags() {
        return $this->tags;
    }

    public function setTags($tags) {
        $this->tags = $tags;
    }
    public function insertarticle(){
        $stmt = $this->cnx->prepare("INSERT INTO articles (nomAr, descriptionAr, imageAr, dateAr, idUtl, idTh, tagsAr) VALUES (:name, :desc, :upload_path, :date, :idUser, :idth, :tags)");
        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindParam(':desc', $this->desc, PDO::PARAM_STR);
        $stmt->bindParam(':upload_path', $this->upload_path, PDO::PARAM_STR);
        $stmt->bindParam(':date', $this->date, PDO::PARAM_STR);
        $stmt->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);
        $stmt->bindParam(':idth', $this->idth, PDO::PARAM_INT);
        $stmt->bindParam(':tags', $this->tags, PDO::PARAM_STR);
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
        $sql = "SELECT * FROM articles WHERE idTh = :theme LIMIT :offset, 10";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindParam(':theme', $idTh, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;

    }
    public function search($idTh,$search){ 
    $sql = 'SELECT * FROM articles WHERE idTh=:theme AND nomAr LIKE :searchTerm';
    $stmt = $this->cnx->prepare($sql);
        $stmt->bindValue(':searchTerm', '%' . $search . '%', PDO::PARAM_STR);
        $stmt->bindParam(':theme', $idTh, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function affiche($idTh){
        $reqarticle = "SELECT * FROM articles WHERE idTh='$idTh' LIMIT 10";
        $result = $this->cnx->prepare($reqarticle);
        $result->execute();
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
                return $results;
    }
    public function affiche_by_idarticle($idArticle){
    $query = "SELECT * FROM articles WHERE idAr = :idArticle";
    $stmt = $this->cnx->prepare($query);
    $stmt->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
    $stmt->execute();
     $result = $stmt->fetch(PDO::FETCH_ASSOC);
     return $result;
    }
    public function CountArticle(){
        $query = "SELECT COUNT(*) as totalplant FROM articles";
        $stmt = $this->cnx->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
         return $result;
      }
}