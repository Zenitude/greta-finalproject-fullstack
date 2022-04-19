<?php

require('models/DataBase.php');

class Connexion extends DataBase
{
    public function loginSite($identify, $password)
    {
        try{
            
            $db = $this->dbConnect();

            $requestConnexion = "SELECT * FROM users WHERE mail = :mail AND pass = :pass";
            
            $loginSite = $db->prepare($requestConnexion);

            $loginSite->bindValue(':mail', $identify);
            $loginSite->bindValue(':pass',$password);

            try{
                if($loginSite->execute())
                {
                    $connexion = $loginSite->fetchAll();
                }
                return $connexion;
            }
            catch(Exception $e)
            {
                throw new Exception('Erreur = '.$e->getMessage());
            }
        }
        catch(Exception $e)
        {
            throw new Exception('Erreur = '.$e->getMessage());
        }
    }
}