<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Réserver une Chambre'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<form action="" method="post">
    
    <div>
        <label for="numberBeds">Lits</label>
        <input type="number" name="numberBeds" id="numberBeds">
    </div>

    <div>
        <label for="childRooms">Chambre enfant</label>
        <input type="number" name="childRoom" id="childRoom">
    </div>

    <div>
        <label for="numberBathrooms">Salles de bain</label>
        <input type="number" name="numberBathroom" id="numberBathroom">
    </div>

    <div>
        <label for="numberToilets">Toilettes</label>
        <input type="number" name="numberToilets" id="numberToilets">
    </div>

    <div>
        <label for="numberSallons">Sallons</label>
        <input type="number" name="numberSallon" id="numberSallon">
    </div>   

    <div>
        <label for="numberTerraces">Terrasses</label>
        <input type="number" name="numberTerraces" id="numberTerraces">
    </div>

    <div>
        <label for="startDate">Date début</label>
        <input type="date" name="startDate" id="startDate">
    </div>

    <div>
        <label for="endDate">Date fin</label>
        <input type="date" name="endDate" id="endDate">
    </div>

    <button class="btn btn-beige">Vérifier disponibilité</button>
    
    <div>
        <label for="selectRoom">Sélectionner une chambre</label>
        <select name="selectRoom" id="selectRoom">
            <?php ?>
        </select>
    </div>

    <button class="btn btn-beige">Ajouter une chambre</button>
    
    <button class="btn btn-beige">Continuer</button>

</form>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('template.php');