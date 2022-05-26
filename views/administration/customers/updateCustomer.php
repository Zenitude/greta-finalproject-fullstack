<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Mise à jour client'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start();?>


<div class="container">
    <h1 class="text-center my-5">Modifier un client</h1>
    <p class="fs-6 fst-italic">* : champs obligatoires</p>

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
    <?php else: ?>
    <form action="index.php?page=administration&section=customers&action=updateACustomer" method="post" class="mb-4">
        <div class="input-group mb-3 d-none">
            <label for="updateIdCustomer" class="form-label w-25">Nom*</label>
            <input type="text" name="updateIdCustomer" id="updateIdCustomer" class="form-control rounded" value="<?php if(isset($_GET['id'])){ echo $_GET['id'];} ?>">
        </div>

        <div class="input-group mb-3">
            <label for="updateLastnameCustomer" class="form-label w-25">Nom*</label>
            <input type="text" name="updateLastnameCustomer" id="updateLastnameCustomer" class="form-control rounded" value="<?php if(isset($_GET['id'])){ echo $detailsCustomer['lastname'];} ?>">
        </div>

        <div class="input-group mb-3">
            <label for="updateFirstnameCustomer" class="form-label w-25">Prénom*</label>
            <input type="text" name="updateFirstnameCustomer" id="updateFirstnameCustomer" class="form-control rounded" value="<?php if(isset($_GET['id'])){ echo $detailsCustomer['firstname'];} ?>">
        </div>

        <div class="input-group mb-3">
            <label for="updateBirthDateCustomer" class="form-labe w-25">Date de naissance*</label>
            <input type="date" name="updateBirthDateCustomer" id="updateBirthDateCustomer" class="form-control rounded" value="<?php if(isset($_GET['id'])){ echo $detailsCustomer['birthdate'];} ?>">
        </div>

        <div class="input-group mb-3">
            <label for="updateSelectSpouse" class="form-label w-25">Conjoint</label>
            <select name="updateSelectSpouse" id="updateSelectSpouse" class="form-select rounded">
                <optgroup label="Sélectionnez un conjoint" selected>
                    <option value="0">0 - Sans conjoint</option>
                </optgroup>
                <?php selectCustomers($detailsCustomer['idConjoint']); ?>
            </select>
        </div>

        <div class="input-group mb-3">
            <span class="w-25">VIP*</span>
            <div>
                <input type="radio" name="updateVipCustomer" id="vipYes" class="form-check-input me-1" value="true" <?php if(isset($_GET['id'])){ if($detailsCustomer['vip'] == 1){ echo 'checked'; }else{ echo '';}} ?>>
                <label for="vipYes">Oui</label>
            </div>
            <div>
                <input type="radio" name="updateVipCustomer" id="vipNo" class="form-check-input ms-2 me-1" value="false" <?php if(isset($_GET['id'])){ if($detailsCustomer['vip'] == 0){ echo 'checked'; }else{ echo '';}} ?>>
                <label for="vipNo">Non</label>
            </div>
        </div>

        <hr>

        <div class="input-group mb-3">
            <label for="updateIdAddress" class="form-label w-25">Adresse</label>
            <select name="updateIdAddress" id="updateIdAddress" class="form-select rounded" >
                <optgroup label="Sélectionnez une address" selected>
                    <?php selectAddress($detailsCustomer['idAddress']); ?>
                </optgroup>
            </select>
        </div>

        <hr>

        <div class="input-group mb-3">
            <label for="updatePhoneCustomer" class="form-label w-25">Téléphone*</label>
            <input type="text" name="updatePhoneCustomer" id="updatePhoneCustomer" class="form-control rounded" value="<?php if(isset($_GET['id'])){ echo $detailsCustomer['phone'];} ?>">
        </div>

        <div class="input-group mb-3">
            <label for="updateMailCustomer" class="form-label w-25">Email*</label>
            <input type="mail" name="updateMailCustomer" id="updateMailCustomer" class="form-control rounded" value="<?php if(isset($_GET['id'])){ echo $detailsCustomer['mail'];} ?>">
        </div>

        <button class="btn bg-beige fs-4 mx-auto border">Modifier</button>

    </form>
    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');