<?php include "src/libs/fonctions/reservation.php";
$data_file = 'src/libs/DB/atelier.json';
$json_array = json_decode(file_get_contents($data_file), true);
reservation();
?>

<!-- Homepage -->
<div class="container-fluid p-lg-5 p-md-3 homepage">
    <?php
    $count = 0;
    for ($i = 0; $i < count($json_array); $i++) {
        if ($json_array[$i]["Etat"] == "actif") {
            $count++;
        }
    }
    if ($count > 0) { ?>
        <h2 class="display-4 text-center px-lg-5 py-lg-4 p-md-3 py-3" style="font-family:Roboto;">NOS ATELIERS</h2>
        <!-- On balaye le fichier atelier.json et on affiche la liste des ateliers actifs -->
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            <?php foreach ($json_array as $key => $val) : ?>
                <?php if ($val["Etat"] == "actif") : ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?= $val["Image"] ?>" class="card-img-top" alt="Illustration atelier" style="max-height: 18rem;">
                            <div class="date bg-light p-3 position-absolute d-flex justify-content-center align-items-center fw-bold"><?= $val["Date"] ?></div>
                            <div class="card-body d-flex row">
                                <h5 class="card-title"><?= $val["Titre"] ?></h5>
                                <p class="card-text"><?= substr($val["Description"], 0, 100) ?>...</p>
                                <div class="d-flex justify-content-between">
                                    <form action="" method="POST" class="w-100 d-flex justify-content-between align-items-end">
                                        <!-- Trigger modal -->
                                        <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#<?= $val["Id"] ?>">En savoir plus</a>

                                        <!-- Scrollable modal -->
                                        <div class="modal fade" id="<?= $val["Id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><?= $val["Titre"] ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Le <strong><?= $val["Date"] ?></strong></p>
                                                        <p>Heure : <strong><?= $val["Heure_debut"] ?></strong></p>
                                                        <p>Durée : <strong><?= $val["Duree"] ?>h</strong></p>
                                                        <p>Places disponibles : <strong><?= $val["Effectif_max"] - count($val["Participants"]) ?></strong></p>
                                                        <p>Prix : <strong><?= $val["Prix"] ?>€</strong></p>
                                                        <p style="text-align: justify;"><?= $val["Description"] ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Fermer</button>
                                                        <?php if ($_SESSION["particulier"] == true or $_SESSION["cuisinier"] == true) { ?>
                                                            <button type="submit" name="reservation" class="btn btn-warning px-4" <?= $val["Effectif_max"] - count($val["Participants"]) <= 0 || $_SESSION["cuisinier"] == true || in_array($_SESSION["particulier"]["id"], $val["Participants"]) ? "disabled" : "" ?>>S'inscrire</button>
                                                        <?php } else {
                                                            echo "<button type=\"button\" name=\"reservation\" class=\"btn btn-warning px-4\" data-bs-dismiss=\"modal\" data-bs-toggle=\"modal\" data-bs-target=\"#choix_inscription\">";
                                                            echo "S'inscrire";
                                                            echo "</button>";
                                                        } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="id" value="<?= $key ?>">
                                        <?php if ($_SESSION["particulier"] == true or $_SESSION["cuisinier"] == true) { ?>
                                            <button type="submit" name="reservation" class="btn btn-warning px-4" <?= $val["Effectif_max"] - count($val["Participants"]) <= 0 || $_SESSION["cuisinier"] == true || in_array($_SESSION["particulier"]["id"], $val["Participants"]) ? "disabled" : "" ?>>S'inscrire</button>
                                        <?php } else {
                                            echo "<button type=\"button\" name=\"reservation\" class=\"btn btn-warning px-4\" data-bs-toggle=\"modal\" data-bs-target=\"#choix_inscription\">";
                                            echo "S'inscrire";
                                            echo "</button>";
                                        } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    <?php } else {
        echo "<h2 class=\"display-4 text-center px-lg-5 py-lg-4 p-md-3 py-3\" style=\"font-family:Roboto;\" >Aucun atelier de prévu actuellement</h2>";
    } ?>
</div>