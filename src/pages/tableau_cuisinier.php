<?php
include "src/libs/fonctions/change_state.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["state"])) {
  change_state();
}
?>

<div class="container-fluid px-0 tableau-cuisinier">
  <h2 class="display-4 text-center p-lg-5 p-md-3 py-3" style="font-family:Roboto;">TABLEAU DE BORD</h2>
  <table class=" table px-0 table-responsive table-hover table-dark">

    <thead>

      <?php
      $data_file_cuisinier = 'src/libs/DB/cuisinier.json';
      $json_array_cuisinier = json_decode(file_get_contents($data_file_cuisinier), true);
      $data_file_atelier = 'src/libs/DB/atelier.json';
      $json_array_atelier = json_decode(file_get_contents($data_file_atelier), true);

      //On cherche l'id correspondant à la liste des ateliers
      $cle = research($json_array_cuisinier, $_SESSION['cuisinier']['id'], "id");
      ?>

      <tr>

        <th class="align-middle text-center" scope="col">Titre</th>
        <th class="align-middle text-center" scope="col">Date</th>
        <th class="align-middle text-center" scope="col">Horaires</th>
        <th class="align-middle text-center" scope="col">Durée</th>
        <th class="align-middle text-center" scope="col">Effectif</th>
        <th class="align-middle text-center" scope="col">Prix</th>
        <th class="align-middle text-center" scope="col">Etat</th>
        <th class="align-middle text-center" scope="col">Activer / Désactiver</th>
        <th class="align-middle text-center" scope="col">Modifier</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($json_array_cuisinier[$cle]['ateliers'] as $val) {
        $cleAtl = research($json_array_atelier, $val, 'Id');

      ?>

        <tr>
          <td class="align-middle text-center"><?= $json_array_atelier[$cleAtl]["Titre"] ?></td>
          <td class="align-middle text-center"><?= $json_array_atelier[$cleAtl]["Date"] ?></td>
          <td class="align-middle text-center"><?= $json_array_atelier[$cleAtl]["Heure_debut"] ?></td>
          <td class="align-middle text-center"><?= $json_array_atelier[$cleAtl]["Duree"] ?>h</td>
          <td class="align-middle text-center"><?= $json_array_atelier[$cleAtl]["Effectif_max"] ?>pers</td>
          <td class="align-middle text-center"><?= $json_array_atelier[$cleAtl]["Prix"] ?>€</td>
          <td class="align-middle text-center text-uppercase font-weight-bold <?= $json_array_atelier[$cleAtl]["Etat"] == "actif" ? "text-success" : "text-danger" ?>"><?= $json_array_atelier[$cleAtl]["Etat"] ?></td>
          <td class="align-middle text-center">
            <form action="" method="post" id="<?= $json_array_atelier[$cleAtl]["id"] ?>">
              <div class="form-check form-switch d-flex justify-content-center">
                <input type="hidden" name="state" value="<?= $json_array_atelier[$cleAtl]["etat"] ?>">
                <input class="form-check-input" type="checkbox" id="<?= $cleAtl ?>" name="state" onchange="this.form.submit()" value="<?= $json_array_atelier[$cleAtl]["Etat"] ?>" <?= $json_array_atelier[$cleAtl]["Etat"] == "actif" ? "checked" :  "" ?>>
                <label class="form-check-label" for="<?= $cleAtl ?>"></label>
              </div>
              <input type="hidden" name="indice" value="<?= $cleAtl ?>">
            </form>
          </td>
          <td class="align-middle text-center">
            <form action="<?= "index.php?page=modification_atelier" ?>" method="post">
              <input type="hidden" name="id" value="<?= $cleAtl ?>">
              <button type="submit" name="modif" class="btn btn-outline-light">Modifier</button>
            </form>
          </td>
        </tr>
      <?php   } ?>
    </tbody>
  </table>
</div>