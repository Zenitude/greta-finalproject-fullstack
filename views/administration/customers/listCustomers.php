<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Liste des clients'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<!-- Customer Delete Success Message | Message de succès lors de la suppression d'un client -->
<?php if(isset($deleteCustomer) && $deleteCustomer != ''){ echo $deleteCustomer; } ?>

<div id="listCustomers" class="container txt-center py-5">

    <h1 class="mb-5 text-center">Liste des clients</h1>

    <!-- Filter search | Recherche par filtre -->
    <form method="POST" action="index.php?page=administration&section=customers&action=listCustomers" class="mb-4 d-flex">
        <div class="d-flex flex-column flex-md-row align-items-center">

            <div class="d-flex flex-column w-100 w-sm-50 me-sm-1">
                <label for="selectSearchCustomer" class="opacity-0">Filtre Recherche</label>
                
                <!-- Select to select the filter | Select pour choisir le filtre -->
                <select name="selectSearchCustomer" id="selectSearchCustomer" class="rounded w-100 ps-1 border">
                    <option value="id">Numéro</option>
                    <option value="lastname">Nom</option>
                    <option value="firstname">Prénom</option>
                    <option value="zipCode">Code postal</option>
                    <option value="city">Ville</option>
                    <option value="vip">VIP</option>
                </select>
            </div>
            
            <!-- input to enter the search | Input pour saisir la recherche -->
            <div class="search position-relative w-100 w-sm-25">
                <label for="searchCustomer" class="opacity-0">Rechercher</label>
                <input type="search" placeholder="Rechercher" id="searchCustomer" name="searchCustomer" class="rounded w-100 border ps-1">
                <button class="btn-search position-absolute"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </form>

    <!-- Display a scroll bar when the screen is less than 992px | Afficher une barre de scroll lorsque l'écran est inférieure à 992px -->
    <div class="table-responsive-lg">

        <!-- Striped Tab and hover Effect | Tabeau rayé et effet au survol -->
        <table class="table table-hover table-striped">

            <!-- Header table | En-tête du tableau -->
            <thead class="bg-beige">
                <tr>
                    <th class="text-center">Numéro</th>
                    <th class="text-center">Nom</th>
                    <th class="text-center">Prénom</th>
                    <th class="text-center">Adresse</th>
                    <th class="text-center">Code Postal</th>
                    <th class="text-center">Ville</th>
                    <th class="text-center">Téléphone</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">VIP</th>
                    <th class="text-center">Nombre de réservations</th>
                    <th class="text-center text-white bg-white">Aperçu</th>
                    <th class="text-center text-white bg-white">Modifier</th>
                    <th class="text-center text-white bg-white">Supprimer</th>
                </tr>
            </thead>

            <!-- Body table | Corps du tableau -->
            <tbody>

                <!-- For each customer | Pour chaque client -->
                <?php foreach($customers as $customer): ?>

                    <?php 
                        // If there is an id key record it in an id variable | Si il existe une clé id l'enregistrer dans une variable id
                        if(isset($customer['id'])){ $id = $customer['id'];}

                        // If a vip key exist | Si une clé vip exist
                        if(isset($customer['vip'])){

                            // According to the value of the vip key | Selon la valeur de la clé vip
                            switch($customer['vip'])
                            {
                                // Display 'No' if the key is 0 | AFficher 'Non' si la clé vaut 0
                                case '0':
                                    $vip = 'Non';
                                    break;

                                // Display 'Yes' if the key is 1 | Afficher 'Oui' si la clé vaut 1
                                case '1': 
                                    $vip = 'Oui';
                                    break;
                            }
                        }
                    ?>
                    
                    <tr class="h-50">
                        <td class="text-center"><?= $id; ?></td>
                        <td class="text-center"><?= $customer['lastname']; ?></td>
                        <td class="text-center"><?= $customer['firstname']; ?></td>
                        <td class="text-center"><?= $customer['street']; ?></td>
                        <td class="text-center"><?= $customer['zipCode']; ?></td>
                        <td class="text-center"><?= $customer['city']; ?></td>
                        <td class="text-center"><?= $customer['phone']; ?></td>
                        <td class="text-center"><?= $customer['mail']; ?></td>
                        <td class="text-center"><?= $vip; ?></td>
                        <td class="text-center"><?= numberOfReservations($id);?></td>
                        <td class="text-center" style="width:5%;">
                            <a href="<?php echo 'index.php?page=administration&section=customers&action=detailsCustomer&id='.$id ?>">
                                <img src="public/resources/images/gestion/voir.png" alt="Détails client" class="img-fluid w-100">
                            </a>
                        </td>
                        <td class="text-center" style="width:5%;">
                            <a href="<?php echo 'index.php?page=administration&section=customers&action=updateCustomer&id='.$id ?>">
                                <img src="public/resources/images/gestion/editer.png" alt="Modifier client" class="img-fluid w-75">
                            </a>
                        </td>
                        <td class="text-center" style="width:5%;">
                            <a href="<?php echo 'index.php?page=administration&section=customers&action=deleteCustomer&id='.$id ?>"<?php echo $id; ?>">
                                <img src="public/resources/images/gestion/supprimer-red.png" alt="Supprimer client" class="img-fluid w-75">
                            </a>
                        </td>
                    <tr>
                        
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

</div>

<?php 
$content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');
