<?php 

/* Importing the Model | Import du Model */
require('models/Customers.php');

/* Function to display the customer list | Fonction permettant d'afficher la liste des clients */
function listCustomers()
{
    if(isset($_POST['selectSearchCustomer']))
    {
        /* Displays the list of customers based on a selected filter | Affiche la liste des clients en fonction d'un filtre choisi*/
        $searchCustomer = new Customers();
        $customers = $searchCustomer->searchCustomer($_POST['selectSearchCustomer'], $_POST['searchCustomer']);
    }
    else
    {
        /* Displays the list of customers without filters | Affiche la liste des clients sans filtre */
        $listCustomers = new Customers();
        $customers = $listCustomers->listCustomers();
    }
        
    if(isset($_GET['delete']) && $_GET['delete'] = 'confirmed')
    {
        /* Displays a success message when deleting a client | Affiche un message de succès lors de la suppression d'un client */
        $deleteCustomer = '<p class="bg-success text-light text-center"> Client numéro '.$_GET['id'].' supprimé avec succès ! </p>'; 
    }
    
    /* Importing the view | Import de la vue */
    require_once('views/administration/customers/listCustomers.php');
}

/* Feature displaying the customer’s first and last name on the delete page | Fonction affichant le nom et prénom du client sur la page de suppression */
function listCustomer($id)
{
    $listCustomer = new Customers();
    $customer = $listCustomer->listCustomer($id);
    echo $customer['lastname'].' '.$customer['firstname'];
}

/* Function displaying a customer’s booking number on the customer list page | Fonction affichant le nombre de réservation d'un client sur la page de liste des clients */
function numberOfReservations($id)
{
    $reservations = new Customers();
    $numberReservations = $reservations->numberReservation($id);
    $countReservations = count($numberReservations);
    return $countReservations;
}

/* Feature to select a client for when creating, updating or deleting */
function selectCustomers($id = null)
{
    $selectTheCustomers = new Customers();
    $selectCustomers = $selectTheCustomers->selectTheCutomers();

    foreach($selectCustomers as $customer)
    {
        if($id != $customer['id'])
        {
            $selected = '';
        }
        else
        {
            $selected = 'selected';
        }
        
        echo '<option value="'.$customer['id'].'"'.$selected.'>'.$customer['id'].' - '.$customer['lastname'].' '.$customer['firstname'].'</option>';
    }
}

/* Function displaying success or failure messages when creating a client | Fonction affichant les messages de succès ou d'échec lors de la création d'un client */
function createCustomer()
{
    if(isset($_GET['validation']) && $_GET['validation'] == 'ok')
    {
        $createCustomer = '<p class="text-center bg-success ps-3"> Utilisateur créé avec succès !</p>';
    }

    if(isset($_GET['err']))
        {
            switch($_GET['err'])
            {
                case 'all':
                    $errorAll = '<p class="text-center bg-danger ps-3"> Tous les champs sont vide !</p>';
                    break;
                case 'lastname' :
                    $errorLastname = '<p class="text-danger text-center ps-3"> Le champ Nom est vide !</p>';
                    break;
                case 'firstname' :
                    $errorFirstname = '<p class="text-danger text-center ps-3"> Le champ Prénom est vide !</p>';
                    break;
                case 'mail':
                    $errorMail = '<p class="text-danger text-center ps-3"> Le champ Mail est vide !</p>';
                    break;
                case 'phone':
                    $errorPhone = '<p class="text-danger text-center ps-3"> Le champ Téléphone est vide ! </p>';
                    break;
                case 'mailwrong':
                    $errorWrongMail = '<p class="text-danger text-center ps-3"> Email invalide !</p>';
                    break;
                case 'birthDate' :
                    $errorBirthDate = '<p class="text-danger text-center ps-3"> Le champ Date de naissance est vide !</p>';
                    break;
                case 'vip' : 
                    $errorVip = '<p class="text-danger text-center">Aucune option n\'a été sélectionné !</p>';
                    break;
                case 'street' : 
                    $errorStreet = '<p class="text-danger text-center">Le champ N° et Nom de Voie est vide !</p>';
                    break;
                case 'zipCode' : 
                    $errorZipCode = '<p class="text-danger text-center">Le champ Code Postal est vide !</p>';
                    break;
                case 'city' : 
                    $errorCity = '<p class="text-danger text-center">Le champ Ville est vide !</p>';
                    break;
                case 'customerExist':
                    $errorCustomerExist = '<p class="text-center bg-warning ps-3"> Utilisateur existant !</p>';
                    break;
                default :
                    $errorAll = '';
                    $errorLastname = '';
                    $errorFirstname = '';
                    $errorMail = '';
                    $errorPhone = '';
                    $errorWrongMail = '';
                    $errorBirthDate = '';
                    $errorVip = '';
                    $errorCustomerExist = '';
            }
        }

    
    require_once('views/administration/customers/createCustomer.php');
}

/* Customer creation function | Fonction de création d'un client */
function addACustomer()
{  
    try
    {
        /* Check if the Lastname field is submit | On vérifie si le champ Nom est envoyé */
        if(isset($_POST['lastnameCustomer'])) 
        {
    
            /* Check if the fields are empty by filtering the whitespaces and html tags | On vérifie si les champs sont vide tout en filtrant les espaces blancs et les balises html */
            if(empty(trim(htmlspecialchars($_POST['lastnameCustomer']))) && empty(trim(htmlspecialchars($_POST['firstnameCustomer']))) && empty(trim(htmlspecialchars($_POST['mailCustomer']))) 
            & empty(htmlspecialchars(trim($_POST['phoneCustomer']))) && empty(htmlspecialchars(trim($_POST['birthDateCustomer']))) && empty(htmlspecialchars(trim($_POST['streetCustomer'])))
            & empty(htmlspecialchars(trim($_POST['zipCodeCustomer']))) && empty(htmlspecialchars(trim($_POST['cityCustomer']))) && empty(htmlspecialchars(trim($_POST['vipCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=createCustomer&err=all');
            }
            else
            {
                if(empty(trim(htmlspecialchars($_POST['lastnameCustomer']))))
                {
                    header('Location: index.php?page=administration&section=customers&action=createCustomer&err=lastname');
                }

                if(empty(trim(htmlspecialchars($_POST['firstnameCustomer']))))
                {
                    header('Location: index.php?page=administration&section=customers&action=createCustomer&err=firstname');
                }
                elseif(empty(trim(htmlspecialchars($_POST['mailCustomer']))))
                {
                    header('Location: index.php?page=administration&section=customers&action=createCustomer&err=mail');
                }
                elseif(empty(trim(htmlspecialchars($_POST['phoneCustomer']))))
                {
                    header('Location: index.php?page=administration&section=customers&action=createCustomer&err=phone');
                }
                elseif(empty(trim(htmlspecialchars($_POST['birthDateCustomer']))))
                {
                    header('Location: index.php?page=administration&section=customers&action=createCustomer&err=birthDate');
                }
                elseif(empty(trim(htmlspecialchars($_POST['streetCustomer']))))
                {
                    header('Location: index.php?page=administration&section=customers&action=createCustomer&err=street');
                }
                elseif(empty(trim(htmlspecialchars($_POST['zipCodeCustomer']))))
                {
                    header('Location: index.php?page=administration&section=customers&action=createCustomer&err=zipCode');
                }
                elseif(empty(trim(htmlspecialchars($_POST['cityCustomer']))))
                {
                    header('Location: index.php?page=administration&section=customers&action=createCustomer&err=city');
                }
                elseif(empty(trim(htmlspecialchars($_POST['vipCustomer']))))
                {
                    header('Location: index.php?page=administration&section=customers&action=createCustomer&err=vip');
                }
                else
                {
                    try
                    {
                        /* check if the email is valid | On vérifie si l'email est valide */
                        if (!filter_var($_POST["mailCustomer"], FILTER_VALIDATE_EMAIL)) 
                        {
                            header('Location: index.php?page=administration&section=customers&action=createCustomer&err=mailwrong');
                        }
                        else
                        {
                            // Field data is transferred to variables
                            $lastname = trim(htmlspecialchars($_POST['lastnameCustomer']));
                            $firstname = trim(htmlspecialchars($_POST['firstnameCustomer']));
                            $mail = trim(htmlspecialchars($_POST['mailCustomer']));
                            $birthDate = trim(htmlspecialchars($_POST['birthDateCustomer']));
                            $street = trim(htmlspecialchars($_POST['streetCustomer']));
                            $zipCode = trim(htmlspecialchars($_POST['zipCodeCustomer']));
                            $city = trim(htmlspecialchars($_POST['cityCustomer']));
                            $idConjoint = trim(htmlspecialchars($_POST['selectSpouse']));
                            $vipCustomer = trim(htmlspecialchars($_POST['vipCustomer']));

                            /* Transfer phone data to a variable by removing unnecessary items | On transfère les données du téléphone dans une variable en supprimant les éléments inutiles */
                            $phoneCustomer = trim(htmlspecialchars($_POST['phoneCustomer']), " \-_.");

                            /* convert string value vip to boolean | Conversion du type chaîne de caractère de Vip en booléen */
                            $vip = filter_var($vipCustomer, FILTER_VALIDATE_BOOLEAN);
                            if($vip)
                            {
                                $vip = 1;
                            }
                            else
                            {
                                $vip = 0;
                            }

                            /* convert string value zipCode to integer | Conversion du type chaîne de caractère de Code Postal vers nombre entier */
                            $zipCode = intval($zipCode, 10);

                            /* If the phone is not formatted correctly it is reformatted | Si le téléphone n'est pas formaté correctement on le reformate */
                            $phone = sprintf("%s.%s.%s.%s.%s",
                            substr($phoneCustomer, 0, 2),
                            substr($phoneCustomer, 2, 2),
                            substr($phoneCustomer, 4, 2),
                            substr($phoneCustomer, 6, 2),
                            substr($phoneCustomer, 8, 2));
            
                            $addCustomer = new Customers;
                            $addCustomer->addCustomer($lastname, $firstname, $mail, $phone, $birthDate, $street, $zipCode, $city, $vip, $idConjoint);
                            header('Location: index.php?page=administration&section=customers&action=createCustomer&validation=ok');
                        }
                    }
                    catch(Exception $e)
                    {
                        throw new Exception('Erreur = '.$e->getMessage());
                    }
                }
            }   
        }
        require_once('views/administration/customers/createCustomer.php');
    }
    catch(Exception $e)
    {
        throw new Exception('Erreur = '.$e->getMessage());
    }
    
}

/* Function to select the address when updating the client | Fonction permettant la sélection de l'adresse lors de la mise à jour du client */
function selectAddress($id)
{
    $customers = new Customers();
    $selectTheAddress = $customers->selectTheAddress();

    foreach($selectTheAddress as $address)
    {
        if($id == $address['idAddress'])
        {
            $selected = "selected";
        }
        else
        {
            $selected = "";
        }

        echo '<option value="'.$address['idAddress'].'"'.$selected.'>'.$address['zipCode'].' '.$address['city'].' - '.$address['street'].'</option>';
    }
}

/* Viewing a Client Update Page | Affichage de la page de mise à jour d'un client */
function updateACustomer()
{
    $customer = new Customers();
    $detailsCustomer = $customer->updateACustomer();
    require_once('views/administration/customers/updateCustomer.php');
}

// Client Update Function | Fonction de mise à jour du client
function updateCustomer()
{
    if(isset($_GET['id'])){ $id = $_GET['id'];}
        
    try
    {
        if(isset($_POST['updateLastnameCustomer'])) // Check if the Lastname field is submit | On vérifie si le champ Nom est envoyé
        {
    
            try
            {
                // check if the email is valid | On vérifie si l'email est valide
                if (!filter_var($_POST["updateMailCustomer"], FILTER_VALIDATE_EMAIL)) 
                {
                    header('Location: index.php?page=administration&section=gestion&action=updateCustomer&err=mailwrong');
                }
                else
                {
                    // Field data is transferred to variables
                    $updateId = $_POST['updateIdCustomer'];
                    $updateLastname = trim(htmlspecialchars($_POST['updateLastnameCustomer']));
                    $updateFirstname = trim(htmlspecialchars($_POST['updateFirstnameCustomer']));
                    $updateMail = trim(htmlspecialchars($_POST['updateMailCustomer']));
                    $updatePhone = trim(htmlspecialchars($_POST['updatePhoneCustomer']), " \-_.");
                    $updateBirthDate = trim(htmlspecialchars($_POST['updateBirthDateCustomer']));
                    $updateIdAddress = trim(htmlspecialchars($_POST['updateIdAddress']));
                    $updateVipCustomer = trim(htmlspecialchars($_POST['updateVipCustomer']));
                    $updateIdConjoint = trim(htmlspecialchars($_POST['updateSelectSpouse']));

                    if($updateVipCustomer == 'true')
                    {
                        $updateVip = 1;
                    }
                    else
                    {
                        $updateVip = 0;
                    }

                    $updateCustomer = new Customers;
                    $updateCustomer->updateCustomer($updateId, $updateLastname, $updateFirstname, $updateMail, $updatePhone, $updateBirthDate, $updateIdAddress, $updateVip, $updateIdConjoint);
                    
                    header('Location: index.php?page=administration&section=customers&action=updateCustomer&id='.$updateId.'&validation=ok');
                }
            }
            catch(Exception $e)
            {
                throw new Exception('Erreur ici = '.$e->getMessage());
            }
        }
        require_once('views/administration/customers/updateCustomer.php');
    }
    catch(Exception $e)
    {
        throw new Exception('Erreur là = '.$e->getMessage());
    }
}

/* Feature displaying the delete client page | Fonction affichant la page de suppression d'un client */
function deleteAnCustomer()
{
    require_once('views/administration/customers/deleteCustomer.php');
}

/* Client Delete Function | Fonction de suppression d'un client */
function deleteCustomer()
{
    if(isset($_GET['id']))
    {
        $id = $_GET['id']; 
        $delete = new Customers();
        $delete->deleteTheCustomer($id);
        
        require_once('views/administration/customers/listCustomers.php');
    }
}

function detailsCustomer()
{
    if(isset($_POST['selectDetailsCustomer']))
    {
        $id = $_POST['selectDetailsCustomer'];
    }
    elseif(isset($_GET['id']))
    {
        $id = $_GET['id'];
    }

    if(isset($_POST['selectDetailsCustomer']) || isset($_GET['id']))
    {
        $customers = new Customers();
        $detailsCustomer = $customers->detailsCustomer($id);
        $detailsReservations = $customers->detailsReservation($id);
        $detailsConjoint = $customers->detailsCustomer($detailsCustomer['idConjoint']);
    }

    require_once('views/administration/customers/detailsCustomer.php');
}