<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Mise à jour client'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start();?>

<?php 
    /*  If the validation parameter exists and it has the value 'ok' display a success message
        Si le paramètre validation existe et qu'il a la valeur 'ok' afficher un message de succès */
    if(isset($_GET['validation']) && $_GET['validation'] == 'ok') 
    { echo '<p class="bg-success text-white text-center">Client mis à jour avec succès !</p>'; } 
?>

<div class="container">
    <h1 class="text-center my-5">Modifier un client</h1>

    <!-- Message indicating that there are mandatory fields | Message indiquant qu'il y a des champs obligatoires -->
    <p id="updateOblig"class="fs-6 fst-italic">* : champs obligatoires</p>

    <!-- If the 'id' attribute does not exist, display the client selection form | Si l'attribut 'id' n'existe pas afficher le formulaire de sélection d'un client -->
    <?php if(!isset($_GET['id'])) : ?>

        <form action="index.php?page=administration" method="GET" class="mb-4 d-flex flex-column">
            <div class="input-group mb-3">
                <label for="selectUpdateCustomer" class="form-label w-25 d-none d-sm-block">Sélectionner un client*</label>
                <select name="selectUpdateCustomer" id="selectUpdateCustomer" class="form-select rounded">
                    <optgroup label="Sélectionnez un client" selected>
                    </optgroup>
                    <?php selectCustomers(); ?>
                </select>
            </div>
            <button class="btn bg-beige fs-sm-4 mx-auto border w-50 h-50">Sélectionner</button>
        </form>

    <!-- If the attribute 'id' exists, display the modification form of a client | Si l'attribut 'id' existe afficher le formulaire de modification d'un client -->
    <?php else: ?>
        <form id="formUpdateCustomer" action="index.php?page=administration&section=customers&action=updateACustomer" method="post" class="mb-4">
            
            <!-- Id Customer (invisible) | Id du client (invisible) -->
            <div class="input-group mb-3 d-none">
                <label for="updateIdCustomer" class="form-label w-25">Id</label>
                <input type="text" name="updateIdCustomer" id="updateIdCustomer" class="form-control rounded w-75" value="<?php if(isset($_GET['id'])){ echo $_GET['id'];} ?>">
            </div>

            <!-- Lastname | Nom -->
            <div class="input-group mb-3">
                <label for="updateLastnameCustomer" class="form-label w-25">Nom*</label>
                <input type="text" name="updateLastnameCustomer" id="updateLastnameCustomer" class="form-control rounded w-75" value="<?php if(isset($_GET['id']))
                { echo $detailsCustomer['lastname'];} ?>">
            </div>

            <!-- Firstname | Prénom -->
            <div class="input-group mb-3">
                <label for="updateFirstnameCustomer" class="form-label w-25">Prénom*</label>
                <input type="text" name="updateFirstnameCustomer" id="updateFirstnameCustomer" class="form-control rounded w-75" value="<?php if(isset($_GET['id']))
                { echo $detailsCustomer['firstname'];} ?>">
            </div>

            <!-- Birth Date | Date de naissance -->
            <div class="input-group mb-3">
                <label for="updateBirthDateCustomer" class="form-labe w-25">Date de naissance*</label>
                <input type="date" name="updateBirthDateCustomer" id="updateBirthDateCustomer" class="form-control rounded w-75" value="<?php if(isset($_GET['id']))
                { echo $detailsCustomer['birthdate'];} ?>">
            </div>

            <!-- Select Spouse | Sélection du conjoint -->
            <div class="input-group mb-3">
                <label for="updateSelectSpouse" class="form-label w-25">Conjoint</label>
                <select name="updateSelectSpouse" id="updateSelectSpouse" class="form-select rounded">
                    <optgroup label="Sélectionnez un conjoint" selected>
                        <option value="0">0 - Sans conjoint</option>
                    </optgroup>
                    <?php if(isset($_GET['id']))
                    {selectCustomers($detailsCustomer['idConjoint']);} ?>
                </select>
            </div>

            <!-- Vip | Vip -->
            <div class="input-group mb-3">
                <span class="w-25">VIP*</span>
                <div>
                    <input type="radio" name="updateVipCustomer" id="vipYes" class="form-check-input me-1" value="true" <?php if(isset($_GET['id'])){ 
                        if($detailsCustomer['vip'] == 1){ echo 'checked'; }else{ echo '';}} ?>>
                    <label for="vipYes">Oui</label>
                </div>
                <div>
                    <input type="radio" name="updateVipCustomer" id="vipNo" class="form-check-input ms-2 me-1" value="false" <?php if(isset($_GET['id'])){ 
                        if($detailsCustomer['vip'] == 0){ echo 'checked'; }else{ echo '';}} ?>>
                    <label for="vipNo">Non</label>
                </div>
            </div>

            <hr>

            <!-- Select Address | Sélection d'une adresse -->
            <div class="input-group mb-3">
                <label for="updateIdAddress" class="form-label w-25">Adresse</label>
                <select name="updateIdAddress" id="updateIdAddress" class="form-select rounded" >
                    <optgroup label="Sélectionnez une address">
                        <?php selectAddress($detailsCustomer['idAddressC']); ?>
                    </optgroup>
                </select>
            </div>

            <hr>

            <!-- Phone | Téléphone -->
            <div class="input-group mb-3">
                <label for="updatePhoneCustomer" class="form-label w-25">Téléphone*</label>
                <input type="text" name="updatePhoneCustomer" id="updatePhoneCustomer" maxlength="14" class="form-control rounded w-75" value="<?php if(isset($_GET['id'])){ 
                    echo $detailsCustomer['phone'];} ?>">
            </div>

            <!-- Mail | Email -->
            <div class="input-group mb-3">
                <label for="updateMailCustomer" class="form-label w-25">Email*</label>
                <input type="mail" name="updateMailCustomer" id="updateMailCustomer" class="form-control rounded w-75" value="<?php if(isset($_GET['id'])){ 
                    echo $detailsCustomer['mail'];} ?>">
            </div>

            <!-- Submit button | Bouton d'envoie -->
            <button class="btn bg-beige fs-4 mx-auto border">Modifier</button>

        </form>

    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');
