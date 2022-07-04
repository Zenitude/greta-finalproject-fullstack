<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Mise à jour Facture'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<?php 
    /*  If the validation parameter exists and it has the value 'ok' display a success message
        Si le paramètre validation existe et qu'il a la valeur 'ok' afficher un message de succès */
    if(isset($_GET['validation']) && $_GET['validation'] == 'ok') 
    { echo '<p class="bg-success text-white text-center">Facture mise à jour avec succès !</p>'; } 
?>

<div class="container py-5 d-flex flex-row">

    <form id="formUpdateInvoice" action="index.php?page=administration&section=invoices&action=updateTheInvoice" method="post" class="mb-4 w-100">
        <input type="text" name="updateIdInvoice" class="d-none" value="<?php echo $_GET['id']; ?>">
        <div class="input-group">
            <label for="updateDiscountInvoice" class="form-label w-25">Taux de ristourne accordée (%)</label>
            <input type="number" name="updateDiscountInvoice" min="25" max="50" id="updateDiscountInvoice" class="form-control rounded w-75" value="25">
        </div>
    
        <button class="btn bg-beige">Mettre à jour</button>
    </form>

</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');