<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Supprimer un client'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container text-center p-5 my-5">

    <?php if(!isset($_GET['id'])) : ?>
    <h1 class="mb-5">Supprimer un client</h1>
    <form action="index.php?page=administration" method="GET" class="mb-4 d-flex flex-column">
        <div class="input-group mb-3">
            <label for="selectDeleteCustomer" class="form-label w-25 d-none d-sm-block">Sélectionner un client*</label>
            <select name="selectDeleteCustomer" id="selectDeleteCustomer" class="form-select rounded">
                <optgroup label="Sélectionnez un client" selected>
                </optgroup>
                <?php selectCustomers(); ?>
            </select>
        </div>
        <button class="btn bg-beige fs-sm-4 mx-auto border w-50 h-50">Sélectionner</button>
    </form>
    <?php else: ?>

    <h1 class="mb-5">Supprimer le client <br><?php listCustomer($_GET['id']); ?></h1>

    <div class="d-flex justify-content-center align-items-center">
        <a href="index.php?page=administration&section=customers&action=listCustomers" class="btn btn-lg bg-beige border me-5">Annuler</a> 
        <a href="index.php?page=administration&section=customers&action=listCustomers&delete=confirmed&id=<?= $_GET['id']; ?>" class="btn btn-lg btn-danger border text-light">Confirmer</a>
    </div>
    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');