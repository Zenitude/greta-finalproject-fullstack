<?php

/* Importing the model : Database / Importation du modèle : Database */
require_once('models/DataBase.php');

/* Création de la classe 'Connexion' qui hérite du modèle DataBase */
class Connexion extends DataBase
{

    /*  Function allowing the admin user to log in | Fonction permettant à l'utilisateur admin de se connecter */
    public function loginSite($identify)
    {
        try{
            $db = $this->dbConnect(); // We connect to the database | On se connecte à la base de donnée

            $requestConnexion = "SELECT * FROM users WHERE mail =:mail"; 
            
            $loginSite = $db->prepare($requestConnexion); // Prepare the request before it is executed | On prépare la requête avant son execution

            $loginSite->bindValue(':mail', $identify); // bindValue will replace in the query the parameter with the value of the variable associated with it

            try{
                if($loginSite->execute()) // Execute the request after it is received all its parameters | On execute la requête après qu'elle est reçue tout ses paramètres
                {
                    /*  If the user is found, the data is retrieved as an object | Si l'utilisateur est trouvé, on récupère les données sous forme d'objet */
                    $connexion = $loginSite->fetch(); 
                }
                return $connexion; // We return the data to the controller | On retourne les données vers le contrôleur
            }
            catch(Exception $e)
            {
                throw new Exception('Erreur Login Excecute = '.$e->getMessage());
            }
        }
        catch(Exception $e)
        {
            throw new Exception('Erreur Login = '.$e->getMessage());
        }
    }

    /*  Function allowing the admin user to log out | Fonction permettant à l'utilisateur admin de se déconnecter */
    public function deconnectSite()
    {
        session_destroy(); // We destroy the session then redirect to the home
        header('Location: index.php?page=home'); // On détruit la session puis on redirige vers l'accueil
    }

}
