<?php 

//require_once('controllers/mainController.php');
require('controllers/home.php');


try
{
    if(isset($_GET['page']))
    {
        if($_GET['page'] == 'home')
        {
            home();
        }
        /*elseif($_GET['page'] == 'reservationHotel')
        {
            if(isset($_GET['section']))
            {
                if($_GET['section'] == 'admin')
                {
                    adminHotel();    
                }
                elseif($_GET['section'] == 'customers')
                {
                    if(isset($_GET['action']))
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
                    }
                    else
                    {
                        listCustomers();
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
                        listReservations();
                    }
                }
                elseif($_GET['section'] == 'invoices')
                {
                    if(isset($_GET['action']))
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
                    }
                    else
                    {
                        listInvoices();
                    }
                }
            }
            else
            {
                adminHotel();
            }
        }*/
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