<?php

/* Importing the model : Database / Importation du modèle : Database */
require_once('models/DataBase.php');

/* Creation of the class/model 'Administration' which inherits the DataBase model | Création de la classe/model 'Administration' qui hérite du modèle DataBase */
class Administration extends DataBase
{
    /* Fonction pour récupérer tous les clients */
    public function countTheCustomers()
    {
        $db = $this->dbConnect();
        $requestCountCustomers = "SELECT * FROM customers";
        $countCustomers = $db->prepare($requestCountCustomers);
        $countCustomers->execute();
        $customers = $countCustomers->fetchAll();
        
        return $customers;
    }

    /* Fonction pour récupérer toutes les Reservations */
    public function countTheReservations()
    {
        $db = $this->dbConnect();
        $requestCountReservations = "SELECT * FROM reservationshotel";
        $countReservations = $db->prepare($requestCountReservations);
        $countReservations->execute();
        $reservations = $countReservations->fetchAll();
        
        return $reservations;
    }

    /* Fonction pour récupérer toutes les factures */
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
