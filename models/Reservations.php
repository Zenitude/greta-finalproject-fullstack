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

    function reservationRooms($dateStart, $dateEnd)
    {
        $db = $this->dbConnect();
        $requestVerifDispoRooms = "SELECT * FROM roomsbooked
                                  JOIN rooms ON rooms.idRoom = roomsbooked.idRoom
                                  JOIN reservationshotel ON reservationshotel.idReservation = roomsbooked.idReservationH
                                  WHERE startDate = :dateStart
                                  AND endDate = :dateEnd";
        $verifDispoRooms = $db->prepare($requestVerifDispoRooms);
        $verifDispoRooms->bindParam(':dateStart', $dateStart);
        $verifDispoRooms->bindParam(':dateEnd', $dateEnd);
        $verifDispoRooms->execute();
        $verifDispo = $verifDispoRooms->fetchAll();
        return $verifDispo;
    }

    function reservationRoomsDispo()
    {
        $db = $this->dbConnect();
        $requestRoomsDispo = "SELECT * FROM rooms";
        $roomsDispo = $db->prepare($requestRoomsDispo);
        $roomsDispo->execute();
        $rooms = $roomsDispo->fetchAll();

        return $rooms;
    }

    function reservationFinish()
    {
        $db = $this->dbConnect();
        $requestCreateReservation = "INSERT INTO reservationshotel(idCustomer, startDate, endDate) VALUES(':idCustomer', ':startDate', ':endDate')";
        $createReservation = $db->prepare($requestCreateReservation);
        $createReservation->bindParam(':idCustomer', $_COOKIE['reservation_customer']);
        $createReservation->bindParam(':startDate', $_COOKIE['reservation_dateStart']);
        $createReservation->bindParam(':endDate', $_COOKIE['reservation_dateEnd']);
        $createReservation->execute();

        $requestLastReservation = "SELECT idReservation FROM reservationshotel ORDER BY idReservation DESC LIMIT 1";
        $lastReservation = $db->prepare($requestLastReservation);
        $lastReservation->execute();
        $last = $lastReservation->fetch();

        setcookie('reservation_last', $last['idReservation'], 0, '/', '', false, true);
        
        foreach($_POST as $key => $value)
        {
            $requestBookRoom = "INSERT INTO roomsbooked(idReservationH, idRoom) VALUES(:idReservationH, :idRoom)";
            $bookRoom = $db->prepare($requestBookRoom);
            $bookRoom->bindParam(':idReservationH', $_COOKIE['reservation_last']);
            $bookRoom->bindParam(':idRoom', $value);
            $bookRoom->execute();
        }

        $requestResumReservation = "SELECT * FROM reservationshotel
                                    JOIN customers ON customers.id = reservationshotel.idCustomer
                                    JOIN roomsbooked ON roomsbooked.idReservationH = reservationshotel.idReservation
                                    JOIN rooms ON rooms.idRoom = roomsbooked.idRoom
                                    WHERE idReservation = :idReservation";
        $resumReservation = $db->prepare($requestLastReservation);
        $resumReservation->bindParam(':idReservation', $_COOKIE['reservation_customer']);
        $resumReservation->execute();
        $resum = $resumReservation->fetchAll();
        return $resum;
    }
}