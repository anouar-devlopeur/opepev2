<?php
class Validation
{
    private $cnx;
    public function __construct()
    {
        $db=new Connection();
        $this->cnx = $db->getConnection();
    
    }
    //validation email

    function isValidEmailutli($email)
    {
        $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/';
        return preg_match($pattern, $email);
    }

    function isValidnomutli($nom, $prenom)
    {
        $pattern = '/^[a-zA-Z]+$/';
        return preg_match($pattern, $nom, $prenom);
    }
}
