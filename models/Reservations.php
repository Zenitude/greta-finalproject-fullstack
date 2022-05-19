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

    function reservationRooms()
    {
        $db = $this->dbConnect();
        $requestVerifDispoRooms = "SELECT * FROM roomsbooked
                                  JOIN rooms ON rooms.idRoom = roomsbooked.idRoom
                                  JOIN reservationshotel ON reservationshotel.idReservation = roomsbooked.idReservationH
                                  WHERE startDate = :dateStart
                                  AND endDate = :dateEnd";
        $verifDispoRooms = $db->prepare($requestVerifDispoRooms);
        $verifDispoRooms->bindParam(':dateStart', $_SESSION['dateStartReservation']);
        $verifDispoRooms->bindParam(':dateEnd', $_SESSION['dateEndReservation']);
        $verifDispoRooms->execute();

        $_SESSION['verifDispoRooms'] = $verifDispoRooms->fetchAll();

        $requestRoomsDispo = "SELECT * FROM rooms";
        $roomsDispo = $db->prepare($requestRoomsDispo);
        $roomsDispo->execute();
        $rooms = $roomsDispo->fetchAll();

        return $rooms;
    }
}