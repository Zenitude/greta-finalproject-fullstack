<?php 
require_once('controllers/mainController.php');



try
{
    if(isset($_GET['page']))
    {
        if($_GET['page'] == 'home')
        {
            home();
        }
        elseif($_GET['page'] == 'connexion')
        {     
            login();
            if($_GET['action'] == 'login')
            {
                login();
            }
        }
        elseif($_GET['page'] == 'administration')
        {
            if($_GET['section'] == 'gestion')
            {
                gestion();
            }
            elseif($_GET['section'] == 'customers')
            {
                if($_GET['action'] == 'listCustomers')
                {
                    listCustomers();
                }
                elseif($_GET['action'] == 'createCustomer')
                {
                    createCustomer();
                }
                elseif($_GET['action'] == 'addSpouse')
                {
                    addSpouse();
                }
                elseif($_GET['action'] == 'addChild')
                {
                    addChild();
                }
                elseif($_GET['action'] == 'updateCustomer')
                {
                    updateCustomer();
                }
                elseif($_GET['action'] == 'readCustomer')
                {
                    readCustomer();
                }
                elseif($_GET['action'] == 'deleteCustomer')
                {
                    deleteCustomer();
                }
                else
                {
                    gestion();
                }
            }
            elseif($_GET['section'] == 'invoices')
            {
                if($_GET['action'] == 'listInvoices')
                {
                    listInvoices();
                }
                elseif($_GET['action'] == 'createInvoice')
                {
                    createInvoice();
                }
                elseif($_GET['action'] == 'updateInvoice')
                {
                    updateInvoice();
                }
                elseif($_GET['action'] == 'readInvoice')
                {
                    readInvoice();
                }
                elseif($_GET['action'] == 'deleteInvoice')
                {
                    deleteInvoice();
                }
                else
                {
                    gestion();
                }
            }
            elseif($_GET['section'] == 'reservations')
            {

                if($_GET['action'] == 'listReservations')
                {
                    listReservations();
                }
                elseif($_GET['action'] == 'reservationRoom')
                {
                    reservationRoom();
                }
                elseif($_GET['action'] == 'reservationCustomer')
                {
                    reservationCustomer();
                }
                elseif($_GET['action'] == 'reservationFinal')
                {
                    reservationFinal();
                }
                elseif($_GET['action'] == 'readReservation')
                {
                    readReservation();
                }
                elseif($_GET['action'] == 'updateReservation')
                {
                    updateReservation();
                }
                elseif($_GET['action'] == 'deleteReservation')
                {
                    deleteReservation();
                }
                else
                {
                    gestion();
                }
            }
            else
            {
                gestion();
            }
        }
        else
        {
            home();
        }
    }
 
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}