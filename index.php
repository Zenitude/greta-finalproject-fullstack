<?php 

session_start();

/* Importing the Primary Controller | Importation du controlleur principal */
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

    /*  Redirects to a customer’s delete page when selecting a customer via the delete page
        Redirige vers la page de suppression d'un client lors de la selection de celui-ci via la page de suppression */
        if(isset($_GET['selectDeleteReservation']))
        {
            header('Location:index.php?page=administration&section=reservations&action=deleteReservation&id='.$_GET['selectDeleteReservation']);
        }

    /*  Redirects to the reservation display page when selecting an reservation on the display page
        Redirige vers la page d'affichage d'une réservation lors de la selection d'une réservation sur la page d'affichage */
        if(isset($_GET['selectReservation']))
        {
            header('Location:index.php?page=administration&section=reservations&action=detailsReservation&id='.$_GET['selectReservation']);
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
        if($_GET['page'] == 'connexion')
        {     
            /*  If the page parameter has a value 'connection' displays the admin login page
                Si le paramètre page à pour valeur connexion affiche la page de connexion admin */
            login();

            /*  If the action parameter has a value 'login' connect you
                Si le paramètre action a pour valeur login connecte toi*/
            if($_GET['action'] == 'login')
            {
                login();
            }
        }
        elseif($_GET['page'] == 'legalNotices')
        { 
            /*  If the page parameter has value 'legalNotices' displays me the Legal Notice page 
                Si le paramètre page a pour valeur legalNotices affiche moi la page des Mentions Légales*/
            legalNotices();
        }
        elseif($_GET['page'] == 'administration') /* If the page parameter has value 'administration' | Si le paramètre page a pour valeur administration */
        {
            if($_GET['section'] == 'gestion') 
            {
                /*  If the section parameter has value 'gestion' displays me the gestion page
                    Si le paramètre section a pour valeur gestion affiche la page de gestion */
                gestion();
            }
            elseif($_GET['section'] == 'customers') /* If the section parameter has value 'customers' | Si le paramètre section a pour valeur customers */
            {
                if($_GET['action'] == 'listCustomers') 
                {
                    /*  If the action parameter has value 'listCustomers' displays me the list of customers page
                        Si le paramètre action a pour valeur listCustomers affiche la page de liste des clients */
                    listCustomers();

                    if(isset($_GET['delete']) && $_GET['delete'] == 'confirmed') 
                    {
                        /*  If the delete parameter exist and has value 'confirmed'
                            Si le paramètre delete existe et a pour valeur confirmed supprime le client */
                        deleteCustomer();
                    }

                }
                elseif($_GET['action'] == 'detailsCustomer')
                {
                    /*  If the action parameter has value 'detailsCustomer' displays a user’s details page
                        Si le paramètre action a pour valeur 'detailsCustomer' affiche la page de détails d'un utilisateur */
                    detailsCustomer();
                }
                elseif($_GET['action'] == 'createCustomer') 
                {
                    /*  If the action parameter has the value 'updateCustomer' shows me the client creation page and the error messages when creating *
                        Si le paramètre action a pour valeur 'updateCustomer' affiche moi la page de création d'un client et les messages d'erreur lors de la création */
                    createCustomer();
                }
                elseif($_GET['action'] == 'addCustomer') 
                {
                    /*  If the action parameter has the value 'addCustomers' shows me the confirmation message to create a client
                        Si le paramètre action a pour valeur 'addCustomers' affiche moi le message de confirmation de création d'un client */
                    addACustomer();
                }
                elseif($_GET['action'] == 'updateCustomer') 
                {
                    /*  If the action parameter is 'updateCustomer' displays to me the update page of a client and the error messages during the update
                        Si le paramètre action a pour valeur 'updateCustomer' affiche moi la page de mise à jour d'un client et les messages d'erreur lors de la mise à jour  */
                    updateACustomer();
                }
                elseif($_GET['action'] == 'updateACustomer') 
                {
                    /*  If the action parameter is updateACustomer' displays me the update confirmation message of a client 
                        Si le paramètre action a pour valeur updateACustomer' affiche moi le message de confirmation de mise à jour d'un client */
                    updateCustomer();
                }
                elseif($_GET['action'] == 'deleteCustomer') 
                {
                    /*  If the action parameter is deleteCustomer' displays a client’s delete page 
                        Si le paramètre action a pour valeur deleteCustomer' affiche la page de suppression d'un client */
                    deleteAnCustomer();
                }
                else
                {
                    /*  If the action parameter does not exist or has no value displays the management page
                        Si le paramètre action n'existe pas ou n'as pas de valeur affiche la page de gestion */
                    gestion();
                }
            }
            elseif($_GET['section'] == 'reservations') /* If the section parameter has value 'reservations' | Si le paramètre section a pour valeur 'reservations' */
            {

                if($_GET['action'] == 'listReservations') 
                {
                    /*  If the action parameter is 'listReservations' displays the page that lists reservations 
                        Si le paramètre action a pour valeur 'listReservations' affiche la page de la liste des réservations */
                    listReservations();

                    if(isset($_GET['delete']) && $_GET['delete'] == 'confirmed') 
                    {
                        /*  If the delete parameter exist and has value 'confirmed' delete the reservation
                            Si le paramètre delete existe et a pour valeur confirmed supprime la réservation */
                        deleteAnReservation();
                    }
                }
                elseif($_GET['action'] == 'createReservation') /* If the section parameter has value 'createReservation' | Si le paramètre section a pour valeur 'createReservation' */
                {
                    if($_GET['option'] == 'finishReservation')
                    {
                        /*  If the option parameter has value 'finishReservation' display the page to complete the booking creation
                            Si le paramètre option a pour valeur 'finishReservation' afficher la page pour terminer la création du la réservation */
                        reservationFinish();
                    }
                    else
                    {
                        /*  If the option parameter does not exist display the booking creation page
                            Si le paramètre option n'existe pas affiche la page de création de réservation */
                        createReservation();
                    }
                }
                elseif($_GET['action'] == 'detailsReservation')
                {
                    /*  If the action parameter has value 'detailsReservation' displays a reservation’s details page
                        Si le paramètre action a pour valeur 'detailsReservation' affiche la page de détails d'une réservation */
                    detailsReservation();
                }
                elseif($_GET['action'] == 'deleteReservation')
                {
                    /*  If the action parameter has value 'deleteReservation' displays the delete reservation page
                        Si le paramètre action a pour valeur 'deleteReservation' affiche la page de suppression d'une réservation */
                    deleteReservation();
                }
                else
                {
                    /*  If the action parameter does not exist or has no value displays the management page
                        Si le paramètre action n'existe pas ou n'as pas de valeur affiche la page de gestion */
                    gestion();
                }
            }
            elseif($_GET['section'] == 'invoices')
            {
                if($_GET['action'] == 'listInvoices')
                {
                    /*  If the action parameter has value 'listInvoices' displays the page that lists invoices 
                        Si le paramètre action a pour valeur 'listInvoices' affiche la page de liste des factures*/
                    listInvoices();
                }
                elseif($_GET['action'] == 'detailsInvoice')
                {
                    /*  If the action parameter has value 'detailsInvoice' displays a invoice's details page 
                        Si le paramètre action a pour valeur 'detailsInvoice' affiche la page de détails d'une facture*/
                    detailsInvoice();
                }
                elseif($_GET['action'] == 'updateInvoice')
                {
                    /*  If the action parameter has value 'updateInvoice' displays the update invoice page*
                        Si le paramètre action a pour valeur 'updateInvoice' affiche la page de mise à jour d'une facture */
                    updateInvoice();
                }
                elseif($_GET['action'] == 'updateTheInvoice')
                {
                    /*  If the action parameter has value 'updateInvoice' displays the update invoice page*
                        Si le paramètre action a pour valeur 'updateInvoice' affiche la page de mise à jour d'une facture */
                    updateTheInvoice();
                }
                else
                {
                    /*  If the action parameter does not exist or has no value displays the management page
                        Si le paramètre action n'existe pas ou n'as pas de valeur affiche la page de gestion */
                    gestion();
                }
            }
            else
            {
                /*  If the section parameter does not exist or has no value displays the management page
                    Si le paramètre action n'existe pas ou n'as pas de valeur affiche la page de gestion */
                gestion();
            }
        }
    }
    if(isset($_GET['action'])) /* If the parameter action exist | Si le paramètre action existe */
    {
        if($_GET['action'] == 'deconnexion')
        {
            /*  If the parameter action has value 'deconnexion' disconnect the user 
                Si le paramètre action a pour valeur 'deconnexion' déconnecter l’utilisateur */
            deconnexion();
        }
    }
    else
    {
        /*  If the page or action parameter does not exist displays the home page
            Si le paramètre page ou action n'existe pas affiche la page d'accueil */
        home();
    }
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}

