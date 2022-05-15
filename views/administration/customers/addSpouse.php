<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Ajouter un conjoint'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<form action="" method="post">
    <div>
        <label for="lastNameSpouse">Nom</label>
        <input type="text" name="lastNameSpouse" id="lastNameSpouse">
    </div>

    <div>
        <label for="firstNameSpouse">Prénom</label>
        <input type="text" name="firstNameSpouse" id="firstNameSpouse">
    </div>

    <div>
        <label for="birthDateSpouse">Date de naissance</label>
        <input type="date" name="birthDateSpouse" id="birthDateSpouse">
    </div>

    <div>
        <span>VIP</span>
        <div>
            <label for="vipYesSpouse">Oui</label>
            <input type="radio" name="vipSpouse" id="vipYesSpouse">
        </div>
        <div>
            <label for="vipNo">Non</label>
            <input type="radio" name="vipSpouse" id="vipNoSpouse">
        </div>
    </div>

    <hr>

    <div>
        <label for="streetSpouse">N° et Nom de Voie</label>
        <input type="text" name="streetSpouse" id="streetSpouse">
    </div>

    <div>
        <label for="supplementSpouse">Supplément</label>
        <input type="text" name="supplementSpouse" id="supplementSpouse">
    </div>

    <div>
        <label for="zipCodeSpouse">Code Postal</label>
        <input type="text" name="zipCodeSpouse" id="zipCodeSpouse">
    </div>

    <div>
        <label for="city">Ville</label>
        <input type="text" name="city" id="city">
    </div>

    <hr>

    <div>
        <label for="phoneSpouse">Téléphone</label>
        <input type="text" name="phoneSpouse" id="phoneSpouse">
    </div>

    <div>
        <label for="mailSpouse">Email</label>
        <input type="mail" name="mailSpouse" id="mailSpouse">
    </div>

    <button class="btn btn-beige">Continuer</button>
</form>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');