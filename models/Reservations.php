<?php

/* Importing the model : Database / Importation du modèle : Database */
require_once('DataBase.php');

/* Creation of the class/model 'Reservations' which inherits the DataBase model | Création de la classe/model 'Reservations' qui hérite du modèle DataBase */
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

    function listReservation($id)
    {
        $db = $this->dbConnect();
        $requestListReservation = "SELECT idReservation, startDate, endDate, lastname, firstname 
                                   FROM reservationshotel
                                   JOIN customers ON customers.id = reservationshotel.idCustomer
                                   WHERE idReservation = :idReservation";
        $listReservation = $db->prepare($requestListReservation);
        $listReservation->bindParam(':idReservation', $id);
        $listReservation->execute();
        $reservation = $listReservation->fetch();
        return $reservation;
    }

    /* Fonction de recherche pour filtrer la liste des réservations */
    function searchReservation($selectSearch, $search)
    {
        switch($selectSearch)
        {
            case 'idReservation':
                $search = $search;
                break;
            case 'lastname' :
                $search = $search;
                break;
            case 'firstname' :
                $search = $search;
                break;
            case 'startDate' :
                $search = implode('-', array_reverse(explode('/', $search, 3)));
                break;
            case 'endDate' : 
                $search = implode('-', array_reverse(explode('/', $search, 3)));
                break;
        }

        $db = $this->dbConnect();
        $requestSearchReservation = "SELECT * FROM reservationshotel
                                     JOIN customers ON customers.id = reservationshotel.idCustomer
                                     WHERE $selectSearch = :value";
        $searchReservation = $db->prepare($requestSearchReservation);
        $searchReservation->bindParam(':value', $search);
        $searchReservation->execute();
        $search = $searchReservation->fetchAll();
        return $search;
    }

    /* Filtrer les chambres réservés en fonction des dates de début et fin d'une réservation */
    function reservationRoomsBooked($dateStart, $dateEnd)
    {
        $tabRoomsBooked = array();

        $db = $this->dbConnect();
        $requestListRoomsBooked = "SELECT * FROM roomsbooked
                                  JOIN reservationshotel ON reservationshotel.idReservation = roomsbooked.idReservationB
                                  WHERE startDate = :dateStart
                                  AND endDate = :dateEnd";
        $listRoomsBooked = $db->prepare($requestListRoomsBooked);
        $listRoomsBooked->bindParam(':dateStart', date('Y-m-d', strtotime($dateStart)));
        $listRoomsBooked->bindParam(':dateEnd', date('Y-m-d', strtotime($dateEnd)));
        $listRoomsBooked->execute();
        $roomsBooked = $listRoomsBooked->fetchAll();

        foreach($roomsBooked as $roomBooked) {
              array_push($tabRoomsBooked, $roomBooked['idRoomB']);
        }

        return $tabRoomsBooked;
    }

    /* Sélectionner toutes les chambres existantes pour pouvoir les filtrer par disponibilité */
    function reservationRooms()
    {
        $tabRooms = array();
        $db = $this->dbConnect();
        $requestListRooms = "SELECT * FROM rooms";
        $listRooms = $db->prepare($requestListRooms);
        $listRooms->execute();
        $rooms = $listRooms->fetchAll();
 
        foreach($rooms as $room)
        {
            array_push($tabRooms, $room['idRoom']);   
        }

        return $tabRooms;
    }

    function reservationRoomsDispo($tabRoomsDispo)
    {
        $db = $this->dbConnect();
        print_r($tabRoomsDispo);
        foreach($tabRoomsDispo as $roomDispo)
        {
            $requestListRoomsDispo = "SELECT * FROM rooms WHERE idRoom = :idRoom";
            $listRoomsDispo = $db->prepare($requestListRoomsDispo);
            $listRoomsDispo->bindParam(':idRoom', $roomDispo);
            $listRoomsDispo->execute();
            
        }
        $roomsDispo = $listRoomsDispo->fetchAll();
        return $roomsDispo;
    }

    function reservationFinish()
    {
        if(isset($_POST))
        {
            try{

                $db = $this->dbConnect();
                $requestCreateReservation = "INSERT INTO reservationshotel(startDate, endDate, idCustomer) VALUES(:startDate, :endDate, :idCustomer)";
                $createReservation = $db->prepare($requestCreateReservation);
                $createReservation->bindParam(':startDate', $_POST['dateStart']);
                $createReservation->bindParam(':endDate', $_POST['dateEnd']);
                $createReservation->bindParam(':idCustomer', $_POST['idCustomer']);
                $createReservation->execute();

                try
                {
                    $requestLastReservation = "SELECT idReservation FROM reservationshotel ORDER BY idReservation DESC LIMIT 1";
                    $lastReservation = $db->prepare($requestLastReservation);
                    $lastReservation->execute();
                    $last = $lastReservation->fetch();

                    try
                    {
                        unset($_POST['dateStart']);
                        unset($_POST['dateEnd']);
                        unset($_POST['idCustomer']);
                        $lastReserv = $last['idReservation'];

                        foreach($_POST as $key)
                        {
                            $requestBookRoom = "INSERT INTO roomsbooked(idReservationB, idRoomB) VALUES(:idReservation, :idRoom)";
                            $bookRoom = $db->prepare($requestBookRoom);
                            $bookRoom->bindParam(':idReservation', $last['idReservation']);
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
                            $resumReservation->bindParam(':idReservation',$last['idReservation']);
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

    function priceRooms($idReservation)
    {
        $db = $this->dbConnect();
        $requestPriceRooms = "SELECT * FROM roomsbooked
                              JOIN rooms ON rooms.idRoom = roomsbooked.idRoomB
                              WHERE idReservationB = :idReservation";
        $priceRooms = $db->prepare($requestPriceRooms);
        $priceRooms->bindParam(':idReservation', $idReservation);
        $priceRooms->execute();
        $price = $priceRooms->fetchAll();
        return $price;
    }

    function createInvoice($date, $sumRooms, $advance, $idReservation)
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
    }

    /* Function to select a booking for editing, deleting or displaying | Fonction pour sélectionner une réservation afin de la modifier, supprimer ou afficher */
    function selectReservations()
    {
        $db = $this->dbConnect();
        $requestSelectReservations = "SELECT * FROM reservationshotel
                                      JOIN customers ON customers.id = reservationshotel.idCustomer";
        $selectReservations = $db->prepare($requestSelectReservations);
        $selectReservations->execute();
        $selectReservation = $selectReservations->fetchAll();
        return $selectReservation;
    }

    function detailsReservation($id)
    {
        $db = $this->dbConnect();
        $requestDetailsReservation = "SELECT * FROM reservationshotel
                                      JOIN customers ON customers.id = reservationshotel.idCustomer
                                      JOIN invoices ON invoices.idReservationI = reservationshotel.idReservation
                                      WHERE idReservation = :idReservation";
        $detailsReservation = $db->prepare($requestDetailsReservation);
        $detailsReservation->bindParam(':idReservation', $id);
        $detailsReservation->execute();
        $details = $detailsReservation->fetch();
        return $details;
    }

    function detailsRoomsBooked($id)
    {
        $db = $this->dbConnect();
        $requestDetailsRoomsBooked = "SELECT * FROM roomsbooked
                                      JOIN reservationshotel ON reservationshotel.idReservation = roomsbooked.idReservationB
                                      JOIN rooms ON rooms.idRoom = roomsbooked.idRoomB
                                      WHERE idReservationB = :idReservation";
        $detailsRoomsBooked = $db->prepare($requestDetailsRoomsBooked);
        $detailsRoomsBooked->bindParam(':idReservation',  $id);
        $detailsRoomsBooked->execute();
        $detailsRooms = $detailsRoomsBooked->fetchAll();
        return $detailsRooms;
    }

    /* Function to delete invoices related to a booking | Fonction pour supprimer les factures liées à une réservation */
    function deleteInvoice($idReservation)
    {
        try
        {
            $db = $this->dbConnect();
            $requestDeleteInvoice = "DELETE FROM invoices 
                                  WHERE idReservationI = :idReservation";
            $deleteInvoice = $db->prepare($requestDeleteInvoice);
            $deleteInvoice->bindParam(':idReservation', $idReservation);
            $deleteInvoice->execute();

        }
        catch(Exception $e)
        {
            throw new Exception('ErreurDeleteInvoice = '.$e->getMessage());
        }
    }

    /* Function to remove reserved rooms from a reservation | Fonction pour supprimer les chambres réservées d'une réservation */
    function deleteRoomsBooked($idReservation)
    {
        try
        {
            $db = $this->dbConnect();
            $requestDeleteRoomsBooked = "DELETE FROM roomsbooked
                                    WHERE idReservationB = :idReservation";
            $deleteRoomsBooked = $db->prepare($requestDeleteRoomsBooked);
            $deleteRoomsBooked->bindParam(':idReservation', $idReservation);
            $deleteRoomsBooked->execute();

        }
        catch(Exception $e)
        {
            throw new Exception('ErreurDeleteRoomsBooked = '.$e->getMessage());
        }
    }

    /* Function to delete a booking | Fonction pour supprimer une réservation */
    function deleteReservation($idReservation)
    {
        try
            {
                $db = $this->dbConnect();
                $requestDeleteReservation = "DELETE FROM reservationshotel
                                 WHERE idReservation = :idReservation";
                $deleteReservation = $db->prepare($requestDeleteReservation);
                $deleteReservation->bindParam(':idReservation', $idReservation);
                $deleteReservation->execute();

                header('Location:index.php?page=administration&section=reservations&action=listReservations');
            }
            catch(Exception $e)
            {
                throw new Exception('ErreurDeleteReservation = '.$e->getMessage());
            }
    }
}

