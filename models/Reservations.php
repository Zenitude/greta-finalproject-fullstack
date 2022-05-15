<?php

require_once('DataBase.php');

class Reservations extends DataBase
{
    function listReservations()
    {
        $db = $this->dbConnect();
        $requestListReservations = "SELECT * FROM reservationshotel 
                                    JOIN customers ON reservationshotel.idCustomer = customers.id
                                    JOIN invoices ON reservationshotel.idReservation = invoices.idReservationH";
        $listReservations = $db->prepare($requestListReservations);
        $listReservations->execute();
        $list = $listReservations->fetchAll();
        return $list;
    }

    function searchReservation($search)
    {
        $db = $this->dbConnect();
        $requestSearchReservation = "SELECT * FROM reservationshotel
                                 JOIN customers ON reservationshotel.idCustomer = customers.id
                                 JOIN invoices ON reservationshotel.idReservation = invoices.idReservationH
                                 WHERE idReservation LIKE $search
                                 OR lastname LIKE $search
                                 OR firstname LIKE $search";
        $searchReservation = $db->prepare($requestSearchReservation);
        $searchReservation->execute();
        $search = $searchReservation->fetchAll();
        return $search;
    }
}