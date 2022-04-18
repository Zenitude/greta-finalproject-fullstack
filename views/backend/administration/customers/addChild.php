<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Ajouter un enfant'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<form action="" method="post">
    <div>
        <label for="lastNameChild">Nom</label>
        <input type="text" name="lastNameChild" id="lastNameChild">
    </div>

    <div>
        <label for="firstNameChild">Prénom</label>
        <input type="text" name="firstNameChild" id="firstNameChild">
    </div>

    <div>
        <label for="birthDateChild">Date de naissance</label>
        <input type="date" name="birthDateChild" id="birthDateChild">
    </div>

    <div>
        <span>VIP</span>
        <div>
            <label for="vipYesChild">Oui</label>
            <input type="radio" name="vipChild" id="vipYesChild">
        </div>
        <div>
            <label for="vipNoChild">Non</label>
            <input type="radio" name="vipChild" id="vipNoChild">
        </div>
    </div>

    <hr>

    <div>
        <label for="phoneChild">Téléphone</label>
        <input type="text" name="phoneChild" id="phoneChild">
    </div>

    <div>
        <label for="mailChild">Email</label>
        <input type="mail" name="mailChild" id="mailChild">
    </div>

    <button class="btn btn-beige">Ajouter un enfant</button>
    <button class="btn btn-beige">Continuer</button>
</form>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');