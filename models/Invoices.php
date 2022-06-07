<?php

/* Importing the model : Database / Importation du modèle : Database */
require_once('DataBase.php');

/* Creation of the class/model 'Invoices' which inherits the DataBase model |Création de la classe/model 'Invoices' qui hérite du modèle DataBase */
class Invoices extends DataBase
{
    /* Function to display the list of invoices | Fonction pour afficher la liste des factures */
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

    /* Function to filter the list of invoices | Fonction pour filtrer la liste des factures */
    function searchInvoice($selectSearch, $search)
    {
        switch($selectSearch)
        {
            case 'idInvoice':
                $search = $search;
                break;
            case 'idReservationI' :
                $search = $search;
                break;
            case 'lastname' :
                $search = $search;
                break;
            case 'firstname' :
                $search = $search;
                break;
        }

        $db = $this->dbConnect();
        $requestSearchInvoice = "SELECT * FROM invoices
                                 JOIN reservationshotel ON reservationshotel.idReservation = invoices.idReservationI
                                 JOIN customers ON customers.id = reservationshotel.idCustomer
                                 WHERE $selectSearch = :value";
        $searchInvoice = $db->prepare($requestSearchInvoice);
        $searchInvoice->bindParam(':value', $search);
        $searchInvoice->execute();
        $search = $searchInvoice->fetchAll();
        return $search;
    }

    /* Fonction pour selectionner une factures lors d'une modification, affichage */
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

    /* Function to select an invoice during a modification, display | Fonction pour afficher les détails d'une facture */
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

    /* Function to display the details of the rooms of an invoice | Fonction pour afficher les détails des chambres d'une facture */
    function detailsRoomsBooked($idInvoice)
    {
        $db = $this->dbConnect();
        $requestFindIdReservation = "SELECT idReservationI FROM invoices
                                     WHERE idInvoice = :idInvoice";
        $findIdReservation = $db->prepare($requestFindIdReservation);
        $findIdReservation->bindParam(':idInvoice', $idInvoice);
        $findIdReservation->execute();
        $findReservation = $findIdReservation->fetch();
        $idReservation = $findReservation['idReservationI'];

        $requestDetailsRoomsBooked = "SELECT * FROM roomsbooked
                                      JOIN rooms ON rooms.idRoom = roomsbooked.idRoomB
                                      WHERE idReservationB = :idReservation";
        $detailsRoomsBooked = $db->prepare($requestDetailsRoomsBooked);
        $detailsRoomsBooked->bindParam(':idReservation', $idReservation);
        $detailsRoomsBooked->execute();
        $roomsBooked = $detailsRoomsBooked->fetchAll();

        return $roomsBooked;

    }

}

