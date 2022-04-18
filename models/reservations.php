<?php

require('models/DataBase.php');

class Reservations extends DataBase
{
    public function readReservations()
    {
        $db = $this->dbConnect();
        return $db;
    }
}