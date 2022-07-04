<?php 

/*  Function to connect to the database
    Fonction permettant de se connecter à la base de données */
class DataBase
{
    /*  Variables to be modified in case of change of host 
        Variables à modifier en cas de changement d'hébergeur */
    private $host = 'localhost';
    private $database = 'lemontagnard';
    private $charset = 'utf8';
    private $user = 'root';
    private $password = 'root';

    /*  The protected keyword that all declared/defined properties/methods are 
        not accessible from the outside but can be inherited by child classes
        
        Le mot-clé protected garantit que toutes les propriétés/méthodes déclarées/définies 
        ne sont pas accessible de l'extérieur mais peuvent être hérités par les classes enfants */
    protected function dbConnect()
    {
        /* Création d'une instance PDO qui représente une connexion à la base de données */
        try{
            $db = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset='.$this->charset, $this->user, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        }
        catch(PDOException $e)
        {
            echo "Échec de la connexion", $e->getMessage();
            $db = null;
            exit();
        }
    }
}

