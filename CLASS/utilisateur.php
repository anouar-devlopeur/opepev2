<?php 
include '../CLASS/Connection.php';
class Utilisateur {
      private $cnx;
      private $nomUtl;
      private $prenomUtl;
      private $emailUtl	;
      private $mdpUtl;	

 
public function __construct() {
    $djd = new Connection();
    $this->cnx = $djd->getConnection();
}

public function getNomUtl() {
    return $this->nomUtl;
}

public function setNomUtl($nomUtl) {
    $this->nomUtl = $nomUtl;
}

// Getter and setter for $prenomUtl
public function getPrenomUtl() {
    return $this->prenomUtl;
}

public function setPrenomUtl($prenomUtl) {
    $this->prenomUtl = $prenomUtl;
}

// Getter and setter for $emailUtl
public function getEmailUtl() {
    return $this->emailUtl;
}

public function setEmailUtl($emailUtl) {
    $this->emailUtl = $emailUtl;
}

// Getter and setter for $mdpUtl
public function getMdpUtl() {
    return $this->mdpUtl;
}

public function setMdpUtl($mdpUtl) {
    $this->mdpUtl = $mdpUtl;
}
public function insertutilisateurs() {

    $query = "INSERT INTO `utilisateurs` (`nomUtl`, `prenomUtl`, `emailUtl`, `mdpUtl`) VALUES ( :nom, :prenom, :email, :mdp)";
    $stmt = $this->cnx->prepare($query);

    // Bind parameters
    $stmt->bindParam(':nom', $this->nomUtl);
    $stmt->bindParam(':prenom', $this->prenomUtl);
    $stmt->bindParam(':email', $this->emailUtl);
    $stmt->bindParam(':mdp', $this->mdpUtl);

    // Execute the query
    $result = $stmt->execute();

    if ($result) {
        $lastInsertedId = $this->cnx->lastInsertId();
        header("Location: role.php?id=$lastInsertedId");
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


