<?php require('models/Reservations.php');

function listReservations()
{

    if(isset($_GET['search']) && !empty($_GET['search']))
    {
        $searchReservations = new Reservations();
        $reservations = $searchReservations->searchReservation($_GET['search']);
    }
    else
    {
        $listReservations = new Reservations();
        $reservations = $listReservations->listReservations();
    }

    if(isset($_GET['delete']) && $_GET['delete'] = 'confirmed')
    {
        $deleteReservation = '<p class="bg-success text-light text-center"> Réservation numéro '.$_GET['id'].' supprimé avec succès ! </p>'; 
    }
    
    require_once('views/administration/reservations/listReservations.php');
}

function searchReservation($search)
{
    
    if(isset($_GET['searchReservation']) && empty(htmlspecialchars(trim($_GET['searchReservation']))))
    {
        header('Location:index.php?page=administration&section=reservations&action=listReservations');
    }

    $searchReservation = new Reservations();
    $reservations = $searchReservation->searchReservation($search);
    
    require_once('views/administration/reservations/listReservations.php');
}

function reservationCustomer()
{
    require_once('views/administration/reservations/reservationCustomer.php');
}

function reservationDates()
{
    if(isset($_POST['selectReservationCustomer'])){ $_SESSION['customerReservation'] = $_POST['selectReservationCustomer']; } 

    require_once('views/administration/reservations/reservationDates.php');
}

function reservationRooms()
{
    if(isset($_POST['dateStartReservation']) && isset($_POST['dateEndReservation']))
    {
        $_SESSION['startReservation'] = $_POST['dateStartReservation'];
        $_SESSION['endReservation'] = $_POST['dateEndReservation'];
    }

    $roomsDispo = new Reservations();
    $rooms = $roomsDispo->reservationRooms();

    require_once('views/administration/reservations/reservationRooms.php');
}

function reservationFinish()
{
    require_once('views/administration/reservations/reservationFinal.php');
}

function readReservation()
{
    require_once('views/administration/reservations/readReservation.php');
}

function updateReservation()
{
    require_once('views/administration/reservations/updateReservation.php');
}

function deleteReservation()
{
    require_once('views/administration/reservations/listReservations.php');
}