<?php

require('models/DataBase.php');

class Administration extends DataBase
{
    public function readGestion()
    {
        $db = $this->dbConnect();
        return $db;
    }
}