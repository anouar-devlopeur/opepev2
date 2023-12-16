<?php 
class Login {
    private $cnx;

    public function __construct() {
        $dd=new Connection();
        $this->cnx = $dd->getConnection();
    }

    function isValidEmail($email) {
        $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/';
        return preg_match($pattern, $email);
    }
    public function login($email, $password) {
        $query = "SELECT r.nomRole, u.idUtl
                  FROM utilisateurs u
                  JOIN roles r ON u.idUtl = r.idUtl
                  WHERE u.emailUtl = :email AND u.mdpUtl = :password";
       
        $res = $this->cnx->prepare($query);
        $res->bindParam(':email', $email);
        $res->bindParam(':password', $password);

        if (!$res->execute()) {
          
            header('location: ./index.php');
        } else {
           
            $result = $res->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                session_start();
                $nomRole = $result['nomRole'];

                if ($nomRole == "client") {
                    $_SESSION['idUtl'] = $result['idUtl'];
                    header('location: ./client.php');
                } elseif ($nomRole == "admin") {
                    $_SESSION['idUtl'] = $result['idUtl'];
                    header('location: ./admin.php');
                } else {
                    echo "<script>alert('Rôle inconnu')</script>";
                }
            } else {
              
                echo "<script>alert('Email ou mot de passe incorrect')</script>";
            }
        }
    }
}



?>