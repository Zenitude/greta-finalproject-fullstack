<?php

require('models/DataBase.php');

class Connexion extends DataBase
{
    public function loginSite($identify, $password)
    {
        $db = $this->dbConnect();

        $requestConnexion = "SELECT * FROM users WHERE mail = $identify AND password = $password";
        
        $verifConnexion = $db->prepare($requestConnexion);

        $verifConnexion->execute() or die(print_r($db->errorInfo()));

        $connexion = $verifConnexion->fetchAll();

        return $connexion;
    }
}