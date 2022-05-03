<?php

require_once('models/DataBase.php');

class Administration extends DataBase
{
    public function countTheCustomers()
    {
        $db = $this->dbConnect();
        $requestCountCustomers = "SELECT * FROM customers";
        $countCustomers = $db->prepare($requestCountCustomers);
        $countCustomers->execute();
        $customers = $countCustomers->fetchAll();
        
        return $customers;
    }

    public function countTheReservations()
    {
        $db = $this->dbConnect();
        $requestCountReservations = "SELECT * FROM reservationshotel";
        $countReservations = $db->prepare($requestCountReservations);
        $countReservations->execute();
        $reservations = $countReservations->fetchAll();
        
        return $reservations;
    }

    public function countTheInvoices()
    {
        $db = $this->dbConnect();
        $requestCountInvoices = "SELECT * FROM invoices";
        $countInvoices = $db->prepare($requestCountInvoices);
        $countInvoices->execute();
        $invoices = $countInvoices->fetchAll();
        
        return $invoices;
    }
}