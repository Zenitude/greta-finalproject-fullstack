<?php 
session_start();
require_once('controllers/mainController.php');

try
{
    /*  Redirects to a customer’s update page when selecting a customer via the update page 
        Redirige vers la page de mise à jour d'un client lors de la selection de celui-ci via la page de mise à jour */
    if(isset($_GET['selectUpdateCustomer']))
    {
        header('Location:index.php?page=administration&section=customers&action=updateCustomer&id='.$_GET['selectUpdateCustomer']);
    }

    /*  Redirects to a customer’s delete page when selecting a customer via the delete page
        Redirige vers la page de suppression d'un client lors de la selection de celui-ci via la page de suppression */
    if(isset($_GET['selectDeleteCustomer']))
    {
        header('Location:index.php?page=administration&section=customers&action=deleteCustomer&id='.$_GET['selectDeleteCustomer']);
    }

    /* Redirects to the customer list page when sending a search criteria to filter information
       Redirige vers la page de la liste des clients lors de l'envoie d'un critère de recherche pour filtrer les informations */
    if(isset($_GET['searchCustomer']) && isset($_GET['selectSearchCustomer']))
    {
        header('Location:index.php?page=administration&section=customers&action=listCustomers&filter='.$_GET['selectSearchCustomer'].'&search='.$_GET['searchCustomer']);
    }

    /* Redirects to the invoice list page when sending a search criterion to filter the information
       Redirige vers la page de la liste des factures lors de l'envoie d'un critère de recherche pour filtrer les informations  */
    if(isset($_GET['searchInvoice']))
    {
        header('Location:index.php?page=administration&section=invoices&action=listInvoices&search='.$_GET['searchInvoice']);
    }

    /* Redirects to the booking list page when sending a search criteria to filter information
       Redirige vers la page de la liste des réservations lors de l'envoie d'un critère de recherche pour filtrer les informations */
    if(isset($_GET['searchReservation']))
    {
        header('Location:index.php?page=administration&section=reservations&action=listReservations&search='.$_GET['searchReservation']);
    }

    /*  Redirects to the invoice display page when selecting an invoice on the display page
        Redirige vers la page d'affichage d'une facture lors de la selection d'une facture sur la page d'affichage */
    if(isset($_GET['selectInvoice']))
    {
        header('Location:index.php?page=administration&section=invoices&action=detailsInvoice&id='.$_GET['selectInvoice']);
    }

    /* If the page parameter exists | Si le paramètre page existe */
    if(isset($_GET['page']))
    {
        /* If the page parameter has a value 'connection' displays the admin login page | Si le paramètre page à pour valeur connexion affiche la page de connexion admin */
        if($_GET['page'] == 'connexion')
        {     
            login();

            /* If the action parameter has a value 'login' connect you |  Si le paramètre action a pour valeur login connecte toi*/
            if($_GET['action'] == 'login')
            {
                login();
            }
        }
        elseif($_GET['page'] == 'legalNotices') /* If the page parameter has value 'legalNotices' displays me the Legal Notice page | Si le paramètre page a pour valeur legalNotices affiche moi la page des Mentions Légales*/
        { 
            legalNotices();
        }
        elseif($_GET['page'] == 'administration') /* If the page parameter has value 'administration' | Si le paramètre page a pour valeur administration */
        {
            if($_GET['section'] == 'gestion') /* If the section parameter has value 'gestion' displays me the gestion page | Si le paramètre section a pour valeur gestion affiche la page de gestion */
            {
                gestion();
            }
            elseif($_GET['section'] == 'customers') /* If the section parameter has value 'customers' | Si le paramètre section a pour valeur customers */
            {
                if($_GET['action'] == 'listCustomers') /* If the action parameter has value 'listCustomers' displays me the list of customers page | Si le paramètre action a pour valeur listCustomers affiche la page de liste des clients */
                {
                    listCustomers();

                    if(isset($_GET['delete']) && $_GET['delete'] == 'confirmed') /* If the delete parameter exist and has value 'confirmed' | Si le paramètre delete existe et a pour valeur confirmed supprime le client */
                    {
                        deleteCustomer();
                    }

                }
                elseif($_GET['action'] == 'createCustomer') /* If the action parameter has the value 'updateCustomer' shows me the client creation page and the error messages when creating | Si le paramètre action a pour valeur 'updateCustomer' affiche moi la page de création d'un client et les messages d'erreur lors de la création */
                {
                    createCustomer();
                }
                elseif($_GET['action'] == 'addCustomer') /* If the action parameter has the value 'addCustomers' shows me the confirmation message to create a client | Si le paramètre action a pour valeur 'addCustomers' affiche moi le message de confirmation de création d'un client */
                {
                    addACustomer();
                }
                elseif($_GET['action'] == 'updateCustomer') /* If the action parameter is 'updateCustomer' displays to me the update page of a client and the error messages during the update  | Si le paramètre action a pour valeur 'updateCustomer' affiche moi la page de mise à jour d'un client et les messages d'erreur lors de la mise à jour  */
                {
                    updateACustomer();
                }
                elseif($_GET['action'] == 'updateACustomer') /* If the action parameter is updateACustomer' displays me the update confirmation message of a client | Si le paramètre action a pour valeur updateACustomer' affiche moi le message de confirmation de mise à jour d'un client */
                {
                    updateCustomer();
                }
                elseif($_GET['action'] == 'deleteCustomer') /* If the action parameter is deleteCustomer' displays a client’s delete page | Si le paramètre action a pour valeur deleteCustomer' affiche la page de suppression d'un client */
                {
                    deleteAnCustomer();
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
                elseif($_GET['action'] == 'createReservation')
                {
                    if($_GET['option'] == 'selectCustomer')
                    {
                        reservationCustomer();
                    }
                    elseif($_GET['option'] == 'selectDates')
                    {
                        reservationDates();
                    }
                    elseif($_GET['option'] == 'selectRooms')
                    {
                        reservationRooms();
                    }
                    elseif($_GET['option'] == 'finishReservation')
                    {
                        reservationFinish();
                    }
                    else
                    {
                        reservationCustomer();
                    }
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
                elseif($_GET['action'] == 'updateInvoice')
                {
                    updateInvoice();
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

