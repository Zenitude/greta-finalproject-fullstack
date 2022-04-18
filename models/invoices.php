<?php

require('models/DataBase.php');

class Invoices extends DataBase
{
    public function readInvoices()
    {
        $db = $this->dbConnect();
        return $db;
    }
}