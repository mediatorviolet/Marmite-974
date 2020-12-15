<?php
$data_utilisateur = 'src/libs/DB/utilisateur.json';
$utilisateur_array = json_decode(file_get_contents($data_utilisateur), true);
$data_atelier = "src/libs/DB/atelier.json";
$atelier_array = json_decode(file_get_contents($data_atelier), true);

$cle = research($utilisateur_array, $_SESSION["particulier"]["id"], "id"); // On cherche l'id du cuisinier qui à créé l'atelier
?>

<div class="bg-dark p-5 mt-5">
    <h2 class="display-4 text-light">Bienvenue <?= $_SESSION["particulier"]["prenom"] ?></h2>
</div>
<div class="container-fluid p-lg-5 p-md-3 espace-perso">
    <h2 class="display-4 text-center p-lg-5 p-md-3 py-3">Vous êtes inscrit aux ateliers suivants :</h2>

    <div class="accordion" id="accordionExample">
        <?php foreach ($utilisateur_array[$cle]["ateliers"] as $val) { // On parcours le tableau "ateliers" du cuisinier qui à créé les ateliers
            $key = research($atelier_array, $val, "Id"); // On cherche l'id des ateliers créés par le cuisinier dans atelier.json
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $atelier_array[$key]["Id"] ?>" aria-expanded="true" aria-controls="collapseOne">
                    <?= $atelier_array[$key]["Titre"] ?>
                </button>
            </h2>
            <div id="<?= $atelier_array[$key]["Id"] ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Le <strong><?= $atelier_array[$key]["Date"] ?></strong></p>
                    <p>Heure : <strong><?= $atelier_array[$key]["Heure_debut"] ?></strong></p>
                    <p>Durée : <strong><?= $atelier_array[$key]["Duree"] ?>h</strong></p>
                    <p>Places disponibles : <strong><?= $atelier_array[$key]["Effectif_max"] - count($atelier_array[$key]["Participants"]) ?></strong></p>
                    <p>Prix : <strong><?= $atelier_array[$key]["Prix"] ?>€</strong></p>
                    <p style="text-align: justify;"><?= $atelier_array[$key]["Description"] ?></p>
                    <div class="text-end">
                        <form action="" method="post">
                            <button type="submit" name="desinscritpion" class="btn btn-light px-4">Se désinscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>