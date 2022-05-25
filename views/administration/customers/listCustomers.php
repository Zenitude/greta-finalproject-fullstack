<!-- Page title / Titre de la page -->
<?php 
$title = 'Réservation Hôtel | Liste des clients'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<?php if(isset($deleteCustomer) && $deleteCustomer != ''){ echo $deleteCustomer; } ?>

<div id="listCustomers" class="container txt-center py-5">

<h1 class="mb-5 text-center">Liste des clients</h1>

    <form method="POST" action="index.php?page=administration&section=customers&action=listCustomers" class="mb-4 d-flex">
        <div class="d-flex flex-column me-1">
            <label for="selectSearchCustomer" class="opacity-0">Sélectionner une catégorie de recherche</label>
            <select name="selectSearchCustomer" id="selectSearchCustomer" class="rounded ps-1 border">
                <option value="id">Numéro</option>
                <option value="lastname">Nom</option>
                <option value="firstname">Prénom</option>
                <option value="zipCode">Code postal</option>
                <option value="city">Ville</option>
                <option value="vip">VIP</option>
            </select>
        </div>
        <div class="search position-relative w-25 d-flex flex-column">
            <label for="searchCustomer" class="opacity-0">Rechercher</label>
            <input type="search" placeholder="Rechercher" id="searchCustomer" name="searchCustomer" class="rounded w-100 border ps-1">
            <button class="btn-search position-absolute"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>

    <table class="table table-hover table-striped">

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
            </tr>
        </thead>

        <tbody>

            <?php //print_r($customers); ?>
            <?php foreach($customers as $customer): ?>

                <?php 
                    //print_r($customer);
                    if(isset($customer['id'])){ $id = $customer['id'];}

                    if(isset($customer['vip'])){
                        switch($customer['vip'])
                        {
                            case '0':
                                $vip = 'Non';
                                break;
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
                    <td class="text-center" style="width:5%;"><a href="<?php echo 'index.php?page=administration&section=customers&action=updateCustomer&id='.$id ?>"><img src="public/resources/images/gestion/editer.png" alt="Modifier client" class="img-fluid"></a></td>
                    <td class="text-center" style="width:5%;"><a href="<?php echo 'index.php?page=administration&section=customers&action=deleteCustomer&id='.$id ?>"<?php echo $id; ?>"><img src="public/resources/images/gestion/supprimer-red.png" alt="Supprimer client" class="img-fluid"></a></td>
                <tr>
                    
            <?php endforeach; ?>
        </tbody>

    </table>

</div>

<?php 
$content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');