<?php
include 'Articledao.php';

class Articleclass
{
    private $cnx;
    // private $name;
    // private $desc;
    // private $upload_path;
    // private $date;
    // private $idUser;

    // private $idth;
    // private $tags;
    // private Article $article;


    public function __construct()
    {
        $db = new Connection();
        $this->cnx = $db->getConnection();
    }

    public function insertarticle(Article $article)
    {
        $name = $article->getName();
        $desc = $article->getDesc();
        $upload = $article->getUploadPath();
        $date = $article->getDate();
        $user_id = $article->getIdUser();
        $th_id = $article->getIdth();
        $tags = $article->getTags();

        $stmt = $this->cnx->prepare("INSERT INTO articles (nomAr, descriptionAr, imageAr, dateAr, idUtl, idTh, tagsAr) VALUES (:name, :desc, :upload_path, :date, :idUser, :idth, :tags)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':desc', $desc, PDO::PARAM_STR);
        $stmt->bindParam(':upload_path', $upload, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':idUser', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':idth', $th_id, PDO::PARAM_INT);
        $stmt->bindParam(':tags', $tags, PDO::PARAM_STR);
        return  $stmt->execute();
    }
    public function pagination($idth)
    {
        $sql = "SELECT COUNT(idAr) as totalarticle FROM articles WHERE idTh = :idth";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindParam(':idth', $idth, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $pagination = $row['totalarticle'];
        return $pagination;
    }
    public function Affpagination($idTh, $offset)
    {
        $sql = "SELECT * FROM articles WHERE idTh = :theme LIMIT :offset, 10";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindParam(':theme', $idTh, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function search($idTh, $search)
    {
        $sql = 'SELECT * FROM articles WHERE idTh=:theme AND nomAr LIKE :searchTerm';
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindValue(':searchTerm', '%' . $search . '%', PDO::PARAM_STR);
        $stmt->bindParam(':theme', $idTh, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function affiche($idTh)
    {
        $reqarticle = "SELECT * FROM articles WHERE idTh='$idTh' LIMIT 10";
        $result = $this->cnx->prepare($reqarticle);
        $result->execute();
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function affiche_by_idarticle($idArticle)
    {
        $query = "SELECT * FROM articles WHERE idAr = :idArticle";
        $stmt = $this->cnx->prepare($query);
        $stmt->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        //  return $result;
        $a = array();
        if ($result) {
            // `idAr`, `nomAr`, `descriptionAr`, `imageAr`, `dateAr`, `idUtl`, `idTh`, `tagsAr`
            $a = new Article(
                $result["idAr"],
                $result["nomAr"],
                $result["descriptionAr"],
                $result["imageAr"],
                $result["dateAr"],
                $result["idUtl"],
                $result["idTh"],
                $result["tagsAr"]
            );
        }

        return $a;
    }
    public function CountArticle()
    {
        $query = "SELECT COUNT(*) as totalplant FROM articles";
        $stmt = $this->cnx->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
