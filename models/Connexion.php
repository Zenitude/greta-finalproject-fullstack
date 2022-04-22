<?php

require('models/DataBase.php');

class Connexion extends DataBase
{
    public function loginSite($identify, $password)
    {
        try{
            $db = $this->dbConnect();

            $requestConnexion = "SELECT * FROM users WHERE mail =:mail AND pass=:pass";
            
            $loginSite = $db->prepare($requestConnexion);

            $loginSite->bindParam(':mail', $identify);
            $loginSite->bindParam(':pass',$password);

            try{
                if($loginSite->execute())
                {
                    $connexion = $loginSite->fetch();
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

    function deconnectSite()
    {
        session_destroy();
        header('Location: index.php?page=home');
    }

}