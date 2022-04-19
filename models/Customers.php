<?php

require('models/DataBase.php');

class Customers extends DataBase
{
    public function readCustomers()
    {
        $db = $this->dbConnect();
        return $db;
    }
}