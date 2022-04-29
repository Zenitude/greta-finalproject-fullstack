<?php

require('models/DataBase.php');

class Home extends DataBase
{
    public function readHome()
    {
        $db = $this->dbConnect();
        return $db;
    }

}