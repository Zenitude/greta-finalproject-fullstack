<?php

require('models/DataBase.php');

class Administration extends DataBase
{
    public function connectGestion()
    {
        $db = $this->dbConnect();
        return $db;
    }
}