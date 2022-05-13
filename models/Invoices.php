<?php

require_once('DataBase.php');

class Invoices extends DataBase
{
    function listInvoices()
    {
        $db = $this->dbConnect();
        $requestListInvoices = "SELECT * FROM invoices
                                JOIN reservationshotel ON invoices.idReservationH = reservationshotel.idReservation
                                JOIN customers ON reservationshotel.idCustomer = customers.id";
        $listInvoices = $db->prepare($requestListInvoices);
        $listInvoices->execute();
        $invoices = $listInvoices->fetchAll();
        return $invoices;
    }

    function searchInvoice($search)
    {
        $db = $this->dbConnect();
        $requestSearchInvoice = "SELECT * FROM invoices
                                 JOIN reservationshotel ON invoices.idReservationH = reservationshotel.idReservation
                                 JOIN customers ON reservationshotel.idCustomer = customers.id
                                 WHERE idInvoice LIKE $search";
        $searchInvoice = $db->prepare($requestSearchInvoice);
        $searchInvoice->execute();
        $search = $searchInvoice->fetchAll();
        return $search;
    }
}