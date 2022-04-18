<?php 

class DataBase
{
    private $host = 'localhost';
    private $database = 'fullstack';
    private $charset = 'utf8';
    private $user = 'root';
    private $password = 'root';

    protected function dbConnect()
    {
        try
        {
            $db = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset='.$this->charset, $this->user, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        }
        catch(PDOException $e)
        {
            echo "Erreur : " . $e->getMessage();
        }
    }
}