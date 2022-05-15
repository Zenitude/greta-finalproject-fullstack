<?php 
session_start();
require_once('controllers/mainController.php');

try
{
    if(isset($_GET['selectUpdateCustomer']))
    {
        header('Location:index.php?page=administration&section=customers&action=updateCustomer&id='.$_GET['selectUpdateCustomer']);
    }

    if(isset($_GET['selectDeleteCustomer']))
    {
        header('Location:index.php?page=administration&section=customers&action=deleteCustomer&id='.$_GET['selectDeleteCustomer']);
    }

    if(isset($_GET['searchCustomer']) && isset($_GET['selectSearchCustomer']))
    {
        header('Location:index.php?page=administration&section=customers&action=listCustomers&filter='.$_GET['selectSearchCustomer'].'&search='.$_GET['searchCustomer']);
    }

    if(isset($_GET['searchInvoice']))
    {
        header('Location:index.php?page=administration&section=invoices&action=listInvoices&search='.$_GET['searchInvoice']);
    }

    if(isset($_GET['searchReservation']))
    {
        header('Location:index.php?page=administration&section=reservations&action=listReservations&search='.$_GET['searchReservation']);
    }

    if(isset($_GET['selectInvoice']))
    {
        header('Location:index.php?page=administration&section=invoices&action=detailsInvoice&id='.$_GET['selectInvoice']);
    }

    if(isset($_GET['page']))
    {
        if($_GET['page'] == 'connexion')
        {     
            login();
            if($_GET['action'] == 'login')
            {
                login();
            }
        }
        elseif($_GET['page'] == 'legalNotices')
        {
            legalNotices();
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

                    if(isset($_GET['delete']) && $_GET['delete'] == 'confirmed')
                    {
                        deleteCustomer();
                    }

                }
                elseif($_GET['action'] == 'createCustomer')
                {
                    createCustomer();
                }
                elseif($_GET['action'] == 'addCustomer')
                {
                    addACustomer();
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
                    updateACustomer();
                }
                elseif($_GET['action'] == 'updateACustomer')
                {
                    updateCustomer();
                }
                elseif($_GET['action'] == 'readCustomer')
                {
                    readCustomer();
                }
                elseif($_GET['action'] == 'deleteCustomer')
                {
                    deleteAnCustomer();
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
                elseif($_GET['action'] == 'detailsInvoice')
                {
                    detailsInvoice();
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
                elseif($_GET['action'] == 'reservationRooms')
                {
                    reservationRooms();
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
    
    }
    if(isset($_GET['action']))
    {
        if($_GET['action'] == 'deconnexion')
        {
            deconnexion();
        }
    }
    else
    {
        home();
    }
 
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}

