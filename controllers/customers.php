<?php require('models/Customers.php');

function listCustomers()
{
    if(isset($_GET['search']) && !empty($_GET['search']))
    {
        $searchCustomer = new Customers();
        $customers = $searchCustomer->searchCustomer($_GET['search']);
    }
    else
    {
        $listCustomers = new Customers();
        $customers = $listCustomers->listCustomers();
    }
    
    if(isset($_GET['delete']) && $_GET['delete'] = 'confirmed')
    {
        $deleteCustomer = '<p class="bg-success text-light text-center"> Client numéro '.$_GET['id'].' supprimé avec succès ! </p>'; 
    }
    
    require_once('views/frontend/administration/customers/listCustomers.php');
}

function listCustomer($id)
{
    $listCustomer = new Customers();
    $customer = $listCustomer->listCustomer($id);
    echo $customer['lastname'].' '.$customer['firstname'];
}

function numberOfReservations($id)
{
    $reservations = new Customers();
    $numberReservations = $reservations->numberReservation($id);
    $countReservations = count($numberReservations);
    return $countReservations;
}

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

    
    require_once('views/backend/administration/customers/createCustomer.php');
}

function selectCustomers($id = null)
{
    $selectTheCustomers = new Customers();
    $selectCustomers = $selectTheCustomers->selectTheCutomers();

    

    foreach($selectCustomers as $customer)
    {
        if($id != $customer['id'] || $id == null)
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

function addACustomer()
{  
    try
    {
        if(isset($_POST['lastnameCustomer'])) // Check if the Lastname field is submit | On vérifie si le champ Nom est envoyé
        {
            //var_dump($_POST['lastnameCustomer']);
    
            // Check if the fields are empty by filtering the whitespaces and html tags | On vérifie si les champs sont vide tout en filtrant les espaces blancs et les balises html
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
                        // check if the email is valid | On vérifie si l'email est valide
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

                            // Transfer phone data to a variable by removing unnecessary items | On transfère les données du téléphone dans une variable en supprimant les éléments inutiles
                            $phoneCustomer = trim(htmlspecialchars($_POST['phoneCustomer']), " \-_.");

                            // convert string value vip to boolean | Conversion du type chaîne de caractère de Vip en booléen
                            $vip = filter_var($vipCustomer, FILTER_VALIDATE_BOOLEAN);
                            if($vip)
                            {
                                $vip = 1;
                            }
                            else
                            {
                                $vip = 0;
                            }

                            // convert string value zipCode to integer | Conversion du type chaîne de caractère de Code Postal vers nombre entier
                            $zipCode = intval($zipCode, 10);

                            
                            // format the phone (01 to 09 + 4 pairs of digits separated by dots) | On formate le téléphone (01 à 09 + 4 paires de chiffres séparés par des points)
                            //$regexPhone = '(0|[1-9])[.]([0-9]|[0-9])[.]([0-9]|[0-9])[.]([0-9]|[0-9])[.]([0-9]|[0-9])';
            
                            /*if(preg_match($regexPhone, $phoneCustomer))
                            {
                                // If the phone is already formatted correctly we do nothing | Si le téléphone est déjà formaté correctement on ne fait rien
                                $phone = $phoneCustomer; 
                            }
                            else
                            {*/
                                // If the phone is not formatted correctly it is reformatted | Si le téléphone n'est pas formaté correctement on le reformate
                                $phone = sprintf("%s.%s.%s.%s.%s",
                                substr($phoneCustomer, 0, 2),
                                substr($phoneCustomer, 2, 2),
                                substr($phoneCustomer, 4, 2),
                                substr($phoneCustomer, 6, 2),
                                substr($phoneCustomer, 8, 2));
                            /*}*/
            
                            //var_dump('c-nom : '.$lastname);
                            //var_dump('c-prenom : '.$firstname);
                            //var_dump('c-mail : '.$mail);
                            //var_dump('c-phone :'.$phone);
                            //var_dump('c-date : '.$birthDate);
                            //var_dump('c-rue : '.$street);
                            //var_dump('c-cp : '.$zipCode);
                            //var_dump('c-ville : '.$city);
                            //var_dump('c-conjoint : '.$idConjoint);
                            //var_dump('c-vip : '.$vip);
            
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
        require_once('views/backend/administration/customers/createCustomer.php');
    }
    catch(Exception $e)
    {
        throw new Exception('Erreur = '.$e->getMessage());
    }
    
}

function addSpouse()
{
    require_once('views/backend/administration/customers/addSpouse.php');
}

function addChild()
{
    require_once('views/backend/administration/customers/addChild.php');
}

function readCustomer()
{
    require_once('views/frontend/administration/customers/readCustomer.php');
}

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

function updateACustomer()
{
    $customer = new Customers();
    $detailsCustomer = $customer->updateACustomer();
    require_once('views/backend/administration/customers/updateCustomer.php');
}

function updateCustomer()
{
    if(isset($_GET['id'])){ $id = $_GET['id'];}

    if(isset($_GET['validation']) && $_GET['validation'] == 'ok')
    {
        $updateCustomer = '<p class="text-warning ps-3"> Utilisateur mis à jour avec succès !</p>';
    }

    if(isset($_GET['err']))
        {
            switch($_GET['err'])
            {
                case 'all':
                    $errorUpdateAll = '<span class="text-danger ps-3"> Tous les champs sont vide !</span>';
                    break;
                case 'lastname' :
                    $errorUpdateLastname = '<span class="text-danger ps-3"> Le champ Nom est vide !</span>';
                    break;
                case 'firstname' :
                    $errorUpdatefirstname = '<span class="text-danger ps-3"> Le champ Prénom est vide !</span>';
                    break;
                case 'mail':
                    $errorUpdateMail = '<span class="text-danger ps-3"> Le champ Mail est vide !</span>';
                    break;
                case 'phone':
                    $errorUpdatePhone = '<span class="text-danger ps-3"> Le champ Téléphone est vide ! </span>';
                    break;
                case 'wrongmail':
                    $errorUpdateWrongMail = '<span class="text-danger ps-3"> Email invalide !</span>';
                    break;
                case 'birthDate' :
                    $errorUpdatebirthDate = '<span class="text-danger ps-3"> Le champ Date de naissance est vide !</span>';
                    break;
                default :
                    $errorUpdateAll = '';
                    $errorUpdateLastname = '';
                    $errorUpdateFirstname = '';
                    $errorUpdateMail = '';
                    $errorUpdatePhone = '';
                    $errorUpdateWrongMail = '';
                    $errorUpdateBirthDate = '';
            }
        }
        
    try
    {
        if(isset($_POST['updateLastnameCustomer'])) // Check if the Lastname field is submit | On vérifie si le champ Nom est envoyé
        {
            var_dump($_POST['updateLastnameCustomer']);
            print($_POST['updateLastnameCustomer']);
    
            // Check if the fields are empty by filtering the whitespaces and html tags | On vérifie si les champs sont vide tout en filtrant les espaces blancs et les balises html
            if(empty(trim(htmlspecialchars($_POST['updateLastnameCustomer']))) && empty(trim(htmlspecialchars($_POST['updateFirstnameCustomer']))) && empty(trim(htmlspecialchars($_POST['updateMailCustomer']))) 
            && empty(htmlspecialchars(trim($_POST['updatePhoneCustomer']))) && empty(htmlspecialchars(trim($_POST['updateBirthDateCustomer']))) && empty(htmlspecialchars(trim($_POST['updateIdAddress'])))
            && empty(htmlspecialchars(trim($_POST['updateVipCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=updateCustomer&err=all');
            }
            elseif(empty(trim(htmlspecialchars($_POST['updateLastnameCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=updateCustomer&err=lastname');
            }
            elseif(empty(trim(htmlspecialchars($_POST['updateFirstnameCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=updateCustomer&err=firstname');
            }
            elseif(empty(trim(htmlspecialchars($_POST['updateMailCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=updateCustomer&err=mail');
            }
            elseif(empty(trim(htmlspecialchars($_POST['updateIdAddress']))))
            {
                header('Location: index.php?page=administration&section=customers&action=updateCustomer&err=address');
            }
            elseif(empty(trim(htmlspecialchars($_POST['updatePhoneCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=updateCustomer&err=phone');
            }
            elseif(empty(trim(htmlspecialchars($_POST['updateBirthDateCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=updateCustomer&err=birthDate');
            }
            elseif(empty(trim(htmlspecialchars($_POST['updateVipCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=updateCustomer&err=vip');
            }
            else
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
                        $updateBirthDate = trim(htmlspecialchars($_POST['updateBirthDateCustomer']));
                        $updateIdAddress = trim(htmlspecialchars($_POST['updateIdAddress']));
                        $updateVipCustomer = trim(htmlspecialchars($_POST['updateVipCustomer']));
                        $updateIdConjoint = trim(htmlspecialchars($_POST['updateSelectSpouse']));
        
                        // Transfer phone data to a variable by removing unnecessary items | On transfère les données du téléphone dans une variable en supprimant les éléments inutiles
                        $updatePhoneCustomer = trim(htmlspecialchars($_POST['updatePhoneCustomer']), " \-_.");

                        $updateVip = filter_var($updateVipCustomer, FILTER_VALIDATE_BOOLEAN);

                        if($updateVip)
                        {
                            $updateVip = 1;
                        }
                        else
                        {
                            $updateVip = 0;
                        }

                        // format the phone (01 to 09 + 4 pairs of digits separated by dots) | On formate le téléphone (01 à 09 + 4 paires de chiffres séparés par des points)
                        //$regexPhone = '(0|[1-9])[.]([0-9]|[0-9])[.]([0-9]|[0-9])[.]([0-9]|[0-9])[.]([0-9]|[0-9])';
        
                        /*if(preg_match($regexPhone, $updatePhoneCustomer))
                        {
                            // If the phone is already formatted correctly we do nothing | Si le téléphone est déjà formaté correctement on ne fait rien
                            $updatePhone = $updatePhoneCustomer; 
                        }
                        else
                        {*/
                            // If the phone is not formatted correctly it is reformatted | Si le téléphone n'est pas formaté correctement on le reformate
                            $updatePhone = sprintf("%s.%s.%s.%s.%s",
                            substr($updatePhoneCustomer, 0, 2),
                            substr($updatePhoneCustomer, 2, 2),
                            substr($updatePhoneCustomer, 4, 2),
                            substr($updatePhoneCustomer, 6, 2),
                            substr($updatePhoneCustomer, 8, 2));
                        /*}*/
        
                        //var_dump('c-id : '.$updateId);
                        //var_dump('c-nom : '.$updateLastname);
                        //var_dump('c-prenom : '.$updateFirstname);
                        //var_dump('c-mail : '.$updateMail);
                        //var_dump('c-phone : '.$updatePhone);
                        //var_dump('c-date : '.$updateBirthDate);
                        //var_dump('c-idAddress : '.$updateIdAddress);
                        //var_dump('c-idConjoint : '.$updateIdConjoint);

        
                        $updateCustomer = new Customers;
                        $updateCustomer->updateCustomer($updateId, $updateLastname, $updateFirstname, $updateMail, $updatePhone, $updateBirthDate, $updateIdAddress, $updateVip, $updateIdConjoint);
                        
                        header('Location: index.php?page=administration&section=customers&action=updateCustomer&validation=ok');
                    }
                }
                catch(Exception $e)
                {
                    throw new Exception('Erreur = '.$e->getMessage());
                }
                
            }
        }
        require_once('views/backend/administration/customers/updateCustomer.php');
    }
    catch(Exception $e)
    {
        throw new Exception('Erreur = '.$e->getMessage());
    }
}

function deleteAnCustomer()
{
    require_once('views/backend/administration/customers/deleteCustomer.php');
}

function deleteCustomer()
{
    if(isset($_GET['id']))
    {
        $id = $_GET['id']; 
        $delete = new Customers();
        $delete->deleteTheCustomer($id);
        
        require_once('views/frontend/administration/customers/listCustomers.php');
    }
}