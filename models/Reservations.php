<?php

require_once('DataBase.php');

class Reservations extends DataBase
{
    /* Afficher la liste des réservations */
    function listReservations()
    {
        $db = $this->dbConnect();
        $requestListReservations = "SELECT * FROM reservationshotel 
                                    JOIN customers ON reservationshotel.idCustomer = customers.id
                                    JOIN invoices ON reservationshotel.idReservation = invoices.idReservationI";
        $listReservations = $db->prepare($requestListReservations);
        $listReservations->execute();
        $list = $listReservations->fetchAll();
        return $list;
    }

    /* Fonction de recherche pour filtrer la liste des réservations */
    function searchReservation($search)
    {
        $db = $this->dbConnect();
        $requestSearchReservation = "SELECT * FROM reservationshotel
                                 JOIN customers ON reservationshotel.idCustomer = customers.id
                                 JOIN invoices ON reservationshotel.idReservation = invoices.idReservationI
                                 WHERE idReservation LIKE $search
                                 OR lastname LIKE $search
                                 OR firstname LIKE $search";
        $searchReservation = $db->prepare($requestSearchReservation);
        $searchReservation->execute();
        $search = $searchReservation->fetchAll();
        return $search;
    }

    /* Filtrer les chambres réservés en fonction des dates de début et fin d'une réservation */
    function reservationRooms($dateStart, $dateEnd)
    {
        $db = $this->dbConnect();
        $requestVerifDispoRooms = "SELECT * FROM roomsbooked
                                  JOIN rooms ON rooms.idRoom = roomsbooked.idRoomB
                                  JOIN reservationshotel ON reservationshotel.idReservation = roomsbooked.idReservationB
                                  WHERE startDate = :dateStart
                                  AND endDate = :dateEnd";
        $verifDispoRooms = $db->prepare($requestVerifDispoRooms);
        $verifDispoRooms->bindParam(':dateStart', $dateStart);
        $verifDispoRooms->bindParam(':dateEnd', $dateEnd);
        $verifDispoRooms->execute();
        $verifDispo = $verifDispoRooms->fetchAll();
        return $verifDispo;
    }

    /* Sélectionner toutes les chambres existantes pour pouvoir les filtrer par disponibilité */
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
        if(isset($_POST))
        {
            try{
                $customer = intval($_COOKIE['reservation_customer']);
                $dateStart = date('Y-m-d', strtotime($_COOKIE['reservation_dateStart']));
                $dateEnd = date('Y-m-d', strtotime($_COOKIE['reservation_dateEnd']));

                $db = $this->dbConnect();
                $requestCreateReservation = "INSERT INTO reservationshotel(startDate, endDate, idCustomer) VALUES(:startDate, :endDate, :idCustomer)";
                $createReservation = $db->prepare($requestCreateReservation);
                $createReservation->bindParam(':startDate', $dateStart);
                $createReservation->bindParam(':endDate', $dateEnd);
                $createReservation->bindParam(':idCustomer', $customer);
                $createReservation->execute();

                try
                {
                    $requestLastReservation = "SELECT idReservation FROM reservationshotel ORDER BY idReservation DESC LIMIT 1";
                    $lastReservation = $db->prepare($requestLastReservation);
                    $lastReservation->execute();
                    $last = $lastReservation->fetch();

                    try
                    {
                        setCookie('reservation_last', $last['idReservation'], 0, '/', '', false, true);
                        $lastReserv = intval($_COOKIE['reservation_last']);

                        foreach($_POST as $key)
                        {
                            $requestBookRoom = "INSERT INTO roomsbooked(idReservationB, idRoomB) VALUES(:idReservation, :idRoom)";
                            $bookRoom = $db->prepare($requestBookRoom);
                            $bookRoom->bindParam(':idReservation',$lastReserv);
                            $bookRoom->bindParam(':idRoom', $key);
                            $bookRoom->execute();
                        }

                        try
                        {
                            $requestResumReservation = "SELECT * FROM reservationshotel
                                                        JOIN customers ON customers.id = reservationshotel.idCustomer
                                                        JOIN roomsbooked ON roomsbooked.idReservationB = reservationshotel.idReservation
                                                        JOIN rooms ON rooms.idRoom = roomsbooked.idRoomB
                                                        WHERE reservationshotel.idReservation = :idReservation";
                            $resumReservation = $db->prepare($requestResumReservation);
                            $resumReservation->bindParam(':idReservation',$lastReserv);
                            $resumReservation->execute();
                            $resum = $resumReservation->fetch();
                            return $resum;
                        }
                        catch(Exception $e)
                        {
                            throw new Exception('Erreur Résumé réservation = '.$e->getMessage());
                        }
                    }
                    catch(Exception $e)
                    {
                        throw new Exception('Erreur Réservation chambres = '.$e->getMessage());
                    }
                }
                catch(Exception $e)
                {
                    throw new Exception('Erreur Dernière réservation créée = '.$e->getMessage());
                }
                

            }
            catch(Exception $e)
            {
                throw new Exception('Erreur création réservation = '.$e->getMessage());
            }  
        }
    }

    /*function createInvoice($date, $sumRooms, $advance, $idReservation)
    {
        $db = $this->dbConnect();
        $requestCreateInvoice = "INSERT INTO invoices(date, sumRooms, advance, idReservationI)
                                 VALUES(:date, :sumRooms, :advance, :idReservation)";
        $createInvoice = $db->prepare($requestCreateInvoice);
        $createInvoice->bindParam(':date', $date);
        $createInvoice->bindParam(':sumRooms', $sumRooms);
        $createInvoice->bindParam(':advance', $advance);
        $createInvoice->bindParam(':idReservation', $idReservation);
        $createInvoice->execute();
    }*/
}