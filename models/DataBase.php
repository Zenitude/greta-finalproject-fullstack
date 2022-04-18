<?php 

class DataBase
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=fullstack;charset=utf8', 'root', 'root');
        return $db;
    }
}