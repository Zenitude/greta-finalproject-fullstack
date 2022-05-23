<?php

require_once('DataBase.php');

class Invoices extends DataBase
{
    function listInvoices()
    {
        $db = $this->dbConnect();
        $requestListInvoices = "SELECT * FROM invoices
                                JOIN reservationshotel ON invoices.idReservationI = reservationshotel.idReservation
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
                                 JOIN reservationshotel ON invoices.idReservationI = reservationshotel.idReservation
                                 JOIN customers ON reservationshotel.idCustomer = customers.id
                                 WHERE idInvoice LIKE $search";
        $searchInvoice = $db->prepare($requestSearchInvoice);
        $searchInvoice->execute();
        $search = $searchInvoice->fetchAll();
        return $search;
    }

    function selectTheInvoices()
    {
        $db= $this->dbConnect();
        $requestSelectInvoices = "SELECT * FROM invoices
                                  JOIN reservationshotel ON invoices.idReservationI = reservationshotel.idReservation
                                  JOIN customers ON reservationshotel.idCustomer = customers.id";
        $selectTheInvoices = $db->prepare($requestSelectInvoices);
        $selectTheInvoices->execute();
        $selectInvoices = $selectTheInvoices->fetchAll();
        
        return $selectInvoices;
    }

    function detailsInvoice($id)
    {
        $db = $this->dbConnect();
        $requestDetailsInvoice = "SELECT * FROM invoices
                                  JOIN reservationshotel ON invoices.idReservationI = reservationshotel.idReservation
                                  JOIN customers ON reservationshotel.idCustomer = customers.id
                                  JOIN roomsbooked ON reservationshotel.idReservation = roomsbooked.idReservationB
                                  JOIN rooms ON roomsbooked.idRoomB = rooms.idRoom
                                  WHERE idInvoice = $id";
        $detailsInvoice = $db->prepare($requestDetailsInvoice);
        $detailsInvoice->execute();
        $details = $detailsInvoice->fetch();
        return $details;

    }

}