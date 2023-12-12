<?php 
class Utilisateur {
      private $cnx;

 
public function __construct($pdo) {
    $this->cnx = $pdo;
}
public function insertutilisateurs($email, $mdp, $nom, $prenom) {
    $query = "INSERT INTO utilisateurs (emailUtl, mdpUtl, nomUtl, prenomUtl) VALUES ('$email', '$mdp', '$nom', '$prenom')";
    $result = $this->cnx->prepare($query);

    if ($result->execute()) {
        $lastInsertId = $this->cnx->lastInsertId();
        header("Location: role.php?id=$lastInsertId");
    } else {
        header("Location: signup.php");
    }
}

// role
public function role($role, $idUtilisateur) {
    $query = "INSERT INTO roles (nomRole, idUtl) VALUES ('$role', $idUtilisateur)";
    $result =$this->cnx->prepare($query);
    if ($result->execute()) {
        
        header("Location: ../index.php");
        
    }else {
      
        header("Location: ./traitement/signup.php");
    }
}
}


