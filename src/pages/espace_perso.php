<?php
$data_utilisateur = 'src/libs/DB/utilisateur.json';
$utilisateur_array = json_decode(file_get_contents($data_utilisateur), true);
$data_atelier = "src/libs/DB/atelier.json";
$atelier_array = json_decode(file_get_contents($data_atelier), true);

$cle = research($utilisateur_array, $_SESSION["particulier"]["id"], "id"); // On cherche l'id du particulier qui s'est inscrit à l'atelier

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["desinscritpion"])) {
    desinscription();
}
?>

<div class="bg-dark p-5 mt-5">
    <h2 class="display-4 text-light" style="font-family:Roboto;">Bienvenue <?= $_SESSION["particulier"]["prenom"] ?></h2>
</div>
<?php
// print_r($_SESSION["particulier"]["id"]);
// $clef = research($utilisateur_array, $_SESSION["particulier"]["id"], "id");
// echo "<br>" . $clef . "<br>";
// print_r($utilisateur_array[$clef]["ateliers"]);
// unset($utilisateur_array[$clef]["ateliers"][1]);
// echo "<br>";
// $utilisateur_array[$clef]["ateliers"] = array_values($utilisateur_array[$clef]["ateliers"]);
// print_r($utilisateur_array[$clef]["ateliers"]);
// $cle = research($utilisateur_array, $_SESSION["particulier"]["id"], "id");
// $id_atelier = "a_6d622ce31fb2948aa65f4c2b4fda6848";
// $cle_atelier = array_search($id_atelier, $utilisateur_array[$cle]["ateliers"]);
// print_r($utilisateur_array[$cle]["ateliers"]);
// echo "<br>" . $cle_atelier . "<br>";
// unset($utilisateur_array[$cle]["ateliers"][$cle_atelier]);
// print_r($utilisateur_array[$cle]["ateliers"]);
?>
<div class="container-fluid p-lg-4 p-md-3 espace-perso">
    <?php
    if (!empty($utilisateur_array[$cle]["ateliers"])) { ?>
        <h2 class="display-4 text-center p-lg-5 p-md-3 py-3" style="font-family:Roboto;">Vous êtes inscrit aux ateliers suivants :</h2>

        <div class="accordion" id="accordionExample">
            <?php foreach ($utilisateur_array[$cle]["ateliers"] as $val) { // On parcours le tableau "ateliers" du particulier qui s'est inscrit aux ateliers
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
                                <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
                                    <input type="hidden" name="indice" value="<?= $atelier_array[$key]["Id"] ?>">
                                    <button type="submit" name="desinscritpion" class="btn btn-warning px-4">Se désinscrire</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else {
        echo "<h2 class=\"display-4 text-center p-lg-5 p-md-3 py-3\" style=\"font-family:Roboto;\">";
        echo "Vous n'êtes inscrit à aucun atelier pour le moment";
        echo "</h2>";
        echo "<h4 class=\"text-center p-lg-5 p-md-3 py-3\" style=\"font-family:Roboto;\">";
        echo "Cliquez <a class=\"link-primary\" href=\"index.php\">ici</a> pour voir les ateliers que nous proposons";
        echo "</h4>";
    } ?>
</div>