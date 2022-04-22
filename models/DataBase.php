<?php 

class DataBase
{
    private $host = 'localhost';
    private $database = 'lemontagnard';
    private $charset = 'utf8';
    private $user = 'root';
    private $password = '';

    protected function dbConnect()
    {

        /*$dbname = "config/lemontagnard.db";
        $dsn = 'sqlite:' . $dbname;*/
        try{
            $db = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset='.$this->charset, $this->user, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /*$db = new PDO($dsn);*/
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
