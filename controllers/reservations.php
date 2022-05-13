<?php require('models/Reservations.php');

function listReservations()
{
    $listReservations = new Reservations();
    $reservations = $listReservations->listReservations();

    if(isset($_GET['delete']) && $_GET['delete'] = 'confirmed')
    {
        $deleteReservation = '<p class="bg-success text-light text-center"> Réservation numéro '.$_GET['id'].' supprimé avec succès ! </p>'; 
    }

    require_once('views/frontend/administration/reservations/listReservations.php');
}

function searchReservation($search)
{
    
    if(isset($_GET['searchReservation']) && empty(htmlspecialchars(trim($_GET['searchReservation']))))
    {
        header('Location:index.php?page=administration&section=reservations&action=listReservations');
    }

    $searchReservation = new Reservations();
    $reservations = $searchReservation->searchReservation($search);
    
    require_once('views/frontend/administration/reservations/listReservations.php');
}

function reservationRooms()
{
    require_once('views/backend/administration/reservations/reservationRoom.php');
}

function reservationCustomer()
{
    require_once('views/backend/administration/reservations/reservationCustomer.php');
}

function reservationFinal()
{
    require_once('views/backend/administration/reservations/reservationFinal.php');
}

function readReservation()
{
    require_once('views/frontend/administration/reservations/readReservation.php');
}

function updateReservation()
{
    require_once('views/backend/administration/reservations/updateReservation.php');
}

function deleteReservation()
{
    require_once('views/frontend/administration/reservations/listReservations.php');
}