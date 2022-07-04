<?php

/* Importing the model : Database / Importation du modèle : Database */
require_once('DataBase.php');

/* Creation of the class/model 'Connexion' which inherits the DataBase model |Création de la classe/model 'Connexion' qui hérite du modèle DataBase */
class Customers extends DataBase
{
    /* Function to list customers | Fonction pour lister les clients */
    public function listCustomers()
    {
        try
        {
            $db = $this->dbConnect();
            $requestListCustomers = "SELECT * FROM customers LEFT JOIN addresscustomers ON customers.idAddressC = addresscustomers.idAddress
                                     ORDER BY id ASC";
            $ListCustomers = $db->prepare($requestListCustomers);
            $ListCustomers->execute();
            $customers = $ListCustomers->fetchAll();
            
            return $customers;
        }
        catch(Exception $e)
        {
            throw new Exception('Erreur = '.$e->getMessage());
        }
    }

    /* Fonction pour connaître le nombre de réservation d'un client */
    public function numberReservation($id)
    {
        $db = $this->dbConnect();
        $requestNumberReservations = "SELECT * FROM reservationshotel WHERE idCustomer = :idCustomer";
        $numberReservations = $db->prepare($requestNumberReservations);
        $numberReservations->bindParam(':idCustomer', $id);
        $numberReservations->execute();
        $reservations = $numberReservations->fetchAll();

        return $reservations;
    }

    /* Function to filter the customer list | Fonction pour filtrer la liste des clients */
    public function searchCustomer($selectSearch, $search)
    {
        // Selon la valeur du select
        switch($selectSearch)
        {
            case 'id':
                $search = $search;
                break;
            case 'lastname' :
                $search = ucwords($search); // ucwords > Première lettre de chaque mot en majuscule
                break;
            case 'firstname' :
                $search = ucwords($search);
                break;
            case 'zipCode' :
                $search = intval($search);
                break;
            case 'city' :
                $search = ucwords($search);
                break;
            case 'vip' :
                $search = ucwords($search);
                break;
        }

        // Si select vaut 'vip'
        if($selectSearch == 'vip')
        {
            
            if($search == 'Oui')
            {
                // Si la valeur reçu vaut 'Oui' remplacer par 1
                $search = 1;
            }
            else
            {
                // Dans le cas contraire remplacer par 0
                $search = 0;
            }
        }

        // Récupérer les informations client
        $db = $this->dbConnect();
        $requestSearchCustomer = "SELECT * FROM customers
                                  JOIN addresscustomers ON customers.idAddressC = addresscustomers.idAddress
                                  WHERE $selectSearch = :value";
        $searchCustomer = $db->prepare($requestSearchCustomer);
        $searchCustomer->bindParam(':value', $search);
        $searchCustomer->execute();
        $search = $searchCustomer->fetchAll();
        return $search;
    }

    /* Fonction pour sélectionner un client */
    public function listCustomer($id)
    {
        $db = $this->dbConnect();
        $requestListCustomer = "SELECT lastname, firstname FROM customers WHERE id = :id";
        $listCustomer = $db->prepare($requestListCustomer);
        $listCustomer->bindParam(':id', $id);
        $listCustomer->execute();
        $customer = $listCustomer->fetch();
        return $customer;
    }
    
    /* Fonction pour créer un client */
    public function addCustomer($lastname, $firstname, $mail, $phone, $birthDate, $street, $zipCode, $city, $vip, $idConjoint)
    {

        try{
            /* Checking to see if the customer already exists or not | Vérification pour savoir si le client existe déjà ou non */
            $db = $this->dbConnect();
            $requestSearchCustomer = "SELECT * FROM customers WHERE lastname = :lastname AND firstname = :firstname";
            $searchCustomer = $db->prepare($requestSearchCustomer);
            $searchCustomer->bindParam(':lastname', $lastname);
            $searchCustomer->bindParam(':firstname', $firstname);
            $searchCustomer->execute();
            $customerSearch = $searchCustomer->fetchAll();
            $countCustomer = count($customerSearch);

            if($countCustomer > 0)
            {
                /*  If the client already exists, redirect to the creation page with an error message
                    Si le client existe déjà on redirige vers la page de création avec un message d'erreur */
                header('Location: index.php?page=administration&section=customers&action=createCustomer&err=customerExist');
            }
            else
            {
                // If customer does not exist | Si le client n'existe pas
                try
                {
                    /*  Check if the address entered already exists in our database
                        On vérifie si l'adresse saisie existe déjà dans notre base de données */
                    $requestSearchAddress = "SELECT * FROM addresscustomers WHERE street = :street AND zipCode = :zipCode AND city = :city";
                    $searchAddressCustomers = $db->prepare($requestSearchAddress);
                    $searchAddressCustomers->bindParam(':street', $street);
                    $searchAddressCustomers->bindParam(':zipCode', $zipCode);
                    $searchAddressCustomers->bindParam(':city', $city);
                    $searchAddressCustomers->execute();
                    $searchAddress = $searchAddressCustomers->fetchAll();
                    $countAddress = count($searchAddress);

                    if($countAddress <= 0)
                    {
                        /*  If the address does not exist we create it otherwise we continue the creation of our customer
                            Si l'adresse n'existe pas on la crée dans le cas contraire on continue la création de notre client */
                        $requestAddAddress = "INSERT INTO addresscustomers(street, zipCode, city) VALUES(:street, :zipCode, :city)";
                        $addAddressCustomers = $db->prepare($requestAddAddress);
                        $addAddressCustomers->bindParam(':street', $street);
                        $addAddressCustomers->bindParam(':zipCode', $zipCode);
                        $addAddressCustomers->bindParam(':city', $city);
                        $addAddressCustomers->execute();
                    }                

                    try
                    {
                        /*  After verification of the address we recover the id of this address
                            Après vérification de l'adresse on récupère l'id de cette adresse */
                        $requestSelectAddress = "SELECT * FROM addresscustomers WHERE street = :street AND zipCode = :zipCode AND city = :city";
                        $selectAddress = $db->prepare($requestSelectAddress);
                        $selectAddress->bindParam(':street', $street);
                        $selectAddress->bindParam(':zipCode', $zipCode);
                        $selectAddress->bindParam(':city', $city);
                        $selectAddress->execute();
                        $idAddressSelected = $selectAddress->fetchAll();

                        try
                        {
                            // Customer Creation | Création du client
                            $requestAddCustomer = "INSERT INTO customers(lastname, firstname, mail, phone, birthdate, idAddressC, vip, idConjoint) 
                                                   VALUES(:lastname, :firstname, :mail, :phone, :birthdate, :idAddress, :vip, :idConjoint)";
                            $addCustomer = $db->prepare($requestAddCustomer);
                            $addCustomer->bindParam(':lastname', $lastname);
                            $addCustomer->bindParam(':firstname', $firstname);
                            $addCustomer->bindParam(':mail', $mail);
                            $addCustomer->bindParam(':phone', $phone);
                            $addCustomer->bindParam(':birthdate', $birthDate);
                            $addCustomer->bindParam(':idAddress', $idAddressSelected[0]['idAddress']);
                            $addCustomer->bindParam(':vip', $vip);
                            $addCustomer->bindParam(':idConjoint', $idConjoint);
                            $addCustomer->execute();
                            
                        }
                        catch(Exception $e)
                        {
                            throw new Exception('ErreurAddCustomer = '.$e->getMessage());
                        }
                    }
                    catch(Exception $e)
                    {
                        throw new Exception('ErreurSelectIdAddress = '.$e->getMessage());
                    }
                }
                catch(Exception $e)
                {
                    throw new Exception('Erreur = '.$e->getMessage());
                }
            } 
        }
        catch(Exception $e)
        {
            throw new Exception('Erreur = '.$e->getMessage());
        }
    }

    /* Function to select an address | Fonction pour sélectionner une adresse */
    public function selectTheAddress()
    {
        $db = $this->dbConnect();
        $requestSelectAddress = "SELECT * FROM addresscustomers ORDER BY zipCode, city";
        $selectAddress = $db->prepare($requestSelectAddress);
        $selectAddress->execute();
        $address = $selectAddress->fetchAll();
        return $address;
    }

    /* Function to display a customer’s current information for the update | Fonction pour afficher les informations actuelles d'un client pour la mise à jour */
    public function updateACustomer()
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];

            $db = $this->dbConnect();
            $requestDetailsCustomer = 'SELECT * FROM customers WHERE id = :id';
            $detailsCustomer = $db->prepare($requestDetailsCustomer);
            $detailsCustomer->bindParam(':id', $id);
            $detailsCustomer->execute();
            $customer = $detailsCustomer->fetch();
            return $customer;
        }
    }

    /* Function to update the customer with new information | Fonction pour mettre à jour le client avec les nouvelles informations */
    public function updateCustomer($id, $lastname, $firstname, $mail, $phone, $birthdate, $idAddress, $vip, $idConjoint)
    {

        try{
            
            $db = $this->dbConnect();

            $requestUpdateCustomer = "UPDATE customers
                                      SET lastname = :lastname, firstname = :firstname, mail = :mail, 
                                      phone = :phone, birthdate = :birthdate, idAddressC = :idAddressC, 
                                      vip = :vip, idConjoint = :idConjoint
                                      WHERE customers.id = :idCustomer";
            $updateCustomer = $db->prepare($requestUpdateCustomer);
            $updateCustomer->bindParam(':lastname', $lastname);
            $updateCustomer->bindParam(':firstname', $firstname);
            $updateCustomer->bindParam(':mail', $mail);
            $updateCustomer->bindParam(':phone', $phone);
            $updateCustomer->bindParam(':birthdate', $birthdate);
            $updateCustomer->bindParam(':idAddressC', $idAddress);
            $updateCustomer->bindParam(':vip', $vip);
            $updateCustomer->bindParam(':idConjoint', $idConjoint);
            $updateCustomer->bindParam(':idCustomer', $id);
            $updateCustomer->execute();

        }
        catch(Exception $e)
        {
            throw new Exception('Erreur Mise à jour = '.$e->getMessage());
        }
    }

    /* Function to select a client, during updates or deletion | Fonction pour sélectionner un client, lors des mises à jour ou suppression */
    public function selectTheCutomers()
    {
        $db= $this->dbConnect();
        $requestSelectCustomers = "SELECT id, lastname, firstname FROM customers";
        $selectTheCustomers = $db->prepare($requestSelectCustomers);
        $selectTheCustomers->execute();
        $selectCustomers = $selectTheCustomers->fetchAll();
        return $selectCustomers;
    }

    /* Fonction pour supprimer un client */
    public function deleteTheCustomer($id)
    {
        $db = $this->dbConnect();
        $requestDeleteCustomer = "DELETE FROM customers WHERE id = :id";
        $deleteCustomer = $db->prepare($requestDeleteCustomer);
        $deleteCustomer->bindParam(':id', $id);
        $deleteCustomer->execute();

    }

    /* Fonction qui affiche les détails d'un client */
    public function detailsCustomer($idCustomer)
    {
        $db = $this->dbConnect();
        $requestDetailsCustomer = "SELECT * FROM customers
                                   JOIN addresscustomers ON addresscustomers.idAddress = customers.idAddressC
                                   WHERE id = :idCustomer";
        $detailsCustomers = $db->prepare($requestDetailsCustomer);
        $detailsCustomers->bindParam(':idCustomer', $idCustomer);
        $detailsCustomers->execute();
        $detailsCustomer = $detailsCustomers->fetch();
        return $detailsCustomer;
    }

    /* Fonction qui affiche les détails des réservations d'un client dans sa fiche */
    public function detailsReservation($idCustomer)
    {
        $db = $this->dbConnect();
        $requestDetailsReservations = "SELECT * FROM reservationshotel
                                       JOIN invoices ON invoices.idReservationI = reservationshotel.idReservation
                                       JOIN customers ON customers.id = reservationshotel.idCustomer
                                       WHERE idCustomer = :idCustomer";
        $detailsReservations = $db->prepare($requestDetailsReservations);
        $detailsReservations->bindParam(':idCustomer', $idCustomer);
        $detailsReservations->execute();
        $detailsReservation = $detailsReservations->fetchAll();
        return $detailsReservation;
    }
}

