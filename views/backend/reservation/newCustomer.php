<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Nouveau client'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<form action="" method="post">
    <div>
        <label for="lastName">Nom</label>
        <input type="text" name="lastName" id="lastName">
    </div>

    <div>
        <label for="firstName">Prénom</label>
        <input type="text" name="firstName" id="firstName">
    </div>

    <div>
        <label for="birthDate">Date de naissance</label>
        <input type="date" name="birthDate" id="birthDate">
    </div>

    <div>
        <label for="selectSpouse">Conjoint</label>
        <select name="selectSpouse" id="selectSpouse">
            <?php ?>
        </select>
    </div>

    <div>
        <span>VIP</span>
        <div>
            <label for="vipYes">Oui</label>
            <input type="radio" name="vip" id="vipYes">
        </div>
        <div>
            <label for="vipNo">Non</label>
            <input type="radio" name="vip" id="vipNo">
        </div>
    </div>

    <hr>

    <div>
        <label for="street">N° et Nom de Voie</label>
        <input type="text" name="street" id="street">
    </div>

    <div>
        <label for="supplement">Supplément</label>
        <input type="text" name="supplement" id="supplement">
    </div>

    <div>
        <label for="zipCode">Code Postal</label>
        <input type="text" name="zipCode" id="zipCode">
    </div>

    <div>
        <label for="city">Ville</label>
        <input type="text" name="city" id="city">
    </div>

    <hr>

    <div>
        <label for="phone">Téléphone</label>
        <input type="text" name="phone" id="phone">
    </div>

    <div>
        <label for="mailCustomer">Email</label>
        <input type="mail" name="mailCustomer" id="mailCustomer">
    </div>

    <button class="btn btn-beige">Créer un client</button>
    <button class="btn btn-beige">Continuer</button>
</form>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('template.php');