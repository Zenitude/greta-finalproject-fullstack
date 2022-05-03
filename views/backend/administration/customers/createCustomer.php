<!-- Page title / Titre de la page -->
<?php $title = 'Gestion | Créer un client'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<?php 
    if(isset($errorAll) && $errorAll != ''){ echo $errorAll; }
    elseif(isset($errorCustomerExist) && $errorCustomerExist != ''){ echo $errorCustomerExist; } 
?>

<div class="container">
    <h1 class="text-center my-5">Créer un client</h1>
    <p class="fs-6 fst-italic">* : champs obligatoires</p>
    <form action="index.php?page=administration&section=customers&action=addCustomer" method="post" class="mb-4">
        <div class="input-group mb-3">
            <label for="lastnameCustomer" class="form-label w-25">Nom*</label>
            <input type="text" name="lastnameCustomer" id="lastnameCustomer" class="form-control rounded">
        </div>
        <?php if(isset($errorLastname) && $errorLastname != ''){ echo $errorLastname; } ?>

        <div class="input-group mb-3">
            <label for="firstnameCustomer" class="form-label w-25">Prénom*</label>
            <input type="text" name="firstnameCustomer" id="firstnameCustomer" class="form-control rounded">
        </div>
        <?php if(isset($errorFirstname) && $errorFirstname != ''){ echo $errorFirstname; } ?>

        <div class="input-group mb-3">
            <label for="birthDateCustomer" class="form-labe w-25">Date de naissance*</label>
            <input type="date" name="birthDateCustomer" id="birthDateCustomer" class="form-control rounded">
        </div>
        <?php if(isset($errorBirthDate) && $errorBirthDate != ''){ echo $errorBirthDate; } ?>

        <div class="input-group mb-3">
            <label for="selectSpouse" class="form-label w-25">Conjoint</label>
            <select name="selectSpouse" id="selectSpouse" class="form-select rounded">
                <optgroup label="Sélectionnez un conjoint" selected>
                    <option value="0" selected>0 - Sans conjoint</option>
                    <?php selectCustomers(); ?>
                </optgroup>
            </select>
        </div>

        <div class="input-group mb-3">
            <span class="w-25">VIP*</span>
            <div>
                <input type="radio" name="vipCustomer" id="vipYes" class="form-check-input me-1" value="true">
                <label for="vipYes">Oui</label>
                <input type="radio" name="vipCustomer" id="vipNo" class="form-check-input ms-2 me-1" value="false">
                <label for="vipNo" checked>Non</label>
            </div>
        </div>
        <?php if(isset($errorVip) && $errorVip != ''){ echo $errorVip; echo $_GET['value']; } ?>


        <hr>

        <div class="input-group mb-3">
            <label for="streetCustomer" class="form-label w-25">N° et Nom de Voie*</label>
            <input type="text" name="streetCustomer" id="streetCustomer" class="form-control rounded">
        </div>
        <?php if(isset($errorStreet) && $errorStreet != ''){ echo $errorStreet; } ?>

        <div class="input-group mb-3">
            <label for="zipCodeCustomer" class="form-label w-25">Code Postal*</label>
            <input type="text" name="zipCodeCustomer" id="zipCodeCustomer" class="form-control rounded">
        </div class="input-group">
        <?php if(isset($errorZipCode) && $errorZipCode != ''){ echo $errorZipCode; } ?>

        <div class="input-group mb-3">
            <label for="cityCustomer" class="form-label w-25">Ville*</label>
            <input type="text" name="cityCustomer" id="cityCustomer" class="form-control rounded">
        </div>
        <?php if(isset($errorCity) && $errorCity != ''){ echo $errorCity; } ?>

        <hr>

        <div class="input-group mb-3">
            <label for="phoneCustomer" class="form-label w-25">Téléphone*</label>
            <input type="text" name="phoneCustomer" id="phoneCustomer" class="form-control rounded">
        </div>
        <?php if(isset($errorPhone) && $errorPhone != ''){ echo $errorPhone; } ?>

        <div class="input-group mb-3">
            <label for="mailCustomer" class="form-label w-25">Email*</label>
            <input type="mail" name="mailCustomer" id="mailCustomer" class="form-control rounded">
        </div>
        <?php 
            if(isset($errorMail) && $errorMail != ''){ echo $errorMail; }
            elseif(isset($errorWrongMail) && $errorWrongMail != ''){ echo $errorWrongMail; } 
        ?>

        <button class="btn bg-beige fs-4 mx-auto border">Créer</button>

    </form>
</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');