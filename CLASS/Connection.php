<?php
class Connection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "opep2"; 
    private $con;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $this->con = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
    }

    public function getConnection(){
        return $this->con;
    }
}


 
// require_once __DIR__."./utilisateur.php";
// $Utilisateur = new Utilisateur($con);
// require_once __DIR__."./login.php";
// $login= new Login($con);
// require_once "validation.php";
// $validation= new Validation($con);
// require_once "clientclas.php"; 
// $client= new Client($con);
// require_once "categorie.php"; 
// $Categorie = new Categorie($con);
// require_once "pannier.php";
// $Pannier = new Pannier($con);
// require_once "plante.php";
// $Plante= new Plante($con);
// require_once "commande.php";
// $Commande = new Commande($con);
// require_once "theme.php";
// $Theme= new Theme($con);
// require_once "tags.php";
// $Tags= new Tags($con);
// require_once "articleclass.php";
// $Article= new Articleclass($con);

   

    


?>
