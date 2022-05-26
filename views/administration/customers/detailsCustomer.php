<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Détails d\'un client '; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container py-5">

    <?php if(!isset($_POST['selectDetailsCustomer'])): ?>
        <h1 class="my-2 text-center">Détails d'un client</h1>

        <form action="index.php?page=administration&section=customers&action=detailsCustomer" method="POST" class="mb-4 d-flex flex-column">
            <div class="input-group mb-3">
                <label for="selectDetailsCustomer" class="form-label w-25 d-none d-sm-block">Sélectionner un client*</label>
                <select name="selectDetailsCustomer" id="selectDetailsCustomer" class="form-select rounded">
                    <optgroup label="Sélectionnez un client">
                        <?php echo selectCustomers(); ?>
                    </optgroup>
                </select>
            </div>
            <button class="btn bg-beige fs-sm-4 mx-auto border w-50 h-50">Sélectionner</button>
        </form>

    <?php else: ?>

        <h1 class="my-2 text-center">Détails du client N° <?= $_POST['selectDetailsCustomer']; ?></h1>

        <h2 class="text-decoration-underline">Informations</h2>
        <p class="fs-4"><span class="fw-bold">Nom : </span> <?= $detailsCustomer['lastname']; ?></p>
        <p class="fs-4"><span class="fw-bold">Prénom : </span> <?= $detailsCustomer['firstname']; ?></p>
        <p class="fs-4"><span class="fw-bold">Date de naissance : </span> <?= date('d/m/Y', strtotime($detailsCustomer['birthdate'])); ?></p>
        <?php if($detailsCustomer['idConjoint'] != 0): ?>
            <p class="fs-4"><span class="fw-bold">Conjoint : </span><a href="index.php?administration&section=customers&action=detailsCustomer&id=<?= $detailsCustomer['idConjoint']; ?>"><?= $detailsConjoint['lastname'].' '.$detailsConjoint['firstname']; ?></a></p>
        <?php endif; ?>
        <p class="fs-4"><span class="fw-bold">VIP : </span><?php if($detailsCustomer['vip'] == 0){ echo 'Non'; } else { echo 'Oui'; } ?></p>

        <hr>

        <h2 class="text-decoration-underline">Adresse et Contacts</h2>

        <address class="fs-4">
        <p class="fs-4"><span class="fw-bold">Adresse : </span></p>
            <p><?= $detailsCustomer['street']; ?></p>
            <p><?= $detailsCustomer['zipCode'].' '.$detailsCustomer['city']; ?></p>
        </address>

        <p class="fs-4"><span class="fw-bold">Email : </span><a href="mailto:<?= $detailsCustomer['mail']; ?>"><?= $detailsCustomer['mail']; ?></a></p>
        <p class="fs-4"><span class="fw-bold">Téléphone : </span><?= $detailsCustomer['phone']; ?></p>

        <hr>

        <h2><span class="text-decoration-underline">Réservations</span> (<?= count($detailsReservations); ?>)</h2>
        <ul>
            <?php foreach($detailsReservations as $detailsReservation): ?>
                <li class="fs-4">
                    <a href="index.php?page=administration&section=reservations&action=detailsReservation&id=<?= $detailsReservation['idReservation']; ?>">
                        <?= 'N° '.$detailsReservation['idReservation']; ?>
                    </a>
                    <?= ' : '.date('d/m/Y', strtotime($detailsReservation['startDate'])).' - '.date('d/m/Y', strtotime($detailsReservation['endDate'])); ?>
                    <a href="index.php?page=administration&section=invoices&action=detailsInvoice&id=<?= $detailsReservation['idInvoice']; ?>">(Facture du <?= date('d/m/Y', strtotime($detailsReservation['date'])); ?>)</a>
                    
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');