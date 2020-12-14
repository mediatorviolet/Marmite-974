<!-- <?php
      $data_file_atelier = 'src/libs/DB/atelier.json';
      $json_array_atelier = json_decode(file_get_contents($data_file_atelier), true);

      $data_file_particulier = 'src/libs/DB/utilisateur.json';
      $json_array_particulier = json_decode(file_get_contents($data_file_particulier), true);



      ?> -->





<div class="container-fluid px-0 tableau-cuisinier">
  <h2 class="display-4 text-center p-lg-5 p-md-3 py-3">Tableau de bord</h2>
  <table class=" table px-0 table-responsive table-hover table-dark">

    <thead>

      <?php
      $data_file_cuisinier = 'src/libs/DB/cuisinier.json';
      $json_array_cuisinier = json_decode(file_get_contents($data_file_cuisinier), true);
      $data_file_atelier = 'src/libs/DB/atelier.json';
      $json_array_atelier = json_decode(file_get_contents($data_file_atelier), true);

      //On cherche id du cuisinier donc quel cimpote a creer les atelier
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
        $cleAtl = research( $json_array_atelier, $val, 'Id');
    
      ?>

    <tr>
        
          <td class="align-middle text-center"><?= $json_array_atelier[$cleAtl]["Titre"] ?></td>
          
          <td class="align-middle text-center"><?= $json_array_atelier[$cleAtl]["Date"] ?></td>
          <td  class="align-middle text-center"><?= $json_array_atelier[$cleAtl]["Heure_debut"] ?></td>
          <td class="align-middle text-center"><?= $json_array_atelier[$cleAtl]["Duree"] ?></td>
          <td class="align-middle text-center"><?= $json_array_atelier[$cleAtl]["Effectif_max"] ?></td>
          <td class="align-middle text-center"><?= $json_array_atelier[$cleAtl]["Prix"] ?></td>
          <td class="align-middle text-center text-uppercase font-weight-bold <?= $json_array_atelier[$cleAtl]["Etat"] == "actif" ? "text-success" : "text-danger" ?>"><?= $json_array_atelier[$cleAtl]["Etat"] ?></td>
          <td class="align-middle text-center">
          <form action="<?= "admin.php?page=dashboard" ?>" method="post" id="<?= $value["id"] ?>">
            <div class="custom-control custom-switch">
              <input type="hidden" name="state" value="<?= $value["etat"] ?>">
              <input type="checkbox" class="custom-control-input" id="<?= $key ?>" name="state" onchange="this.form.submit()" 
              value="<?= $value["etat"] ?>" <?= $value["etat"] == "actif" ? "checked" :  "" ?>>
              <label class="custom-control-label" for="<?= $key ?>"></label>
            </div>
            <input type="hidden" name="indice" value="<?= $key ?>">
          </form>
          </td>
          <td class="align-middle text-center">
            <form action="<?= "admin.php?page=formModif" ?>" method="post">
              <input type="hidden" name="id" value="<?= $key ?>">
              <button type="submit" name="modif" class="btn btn-outline-light">Modifier</button>
            </form>
          </td>
        </tr>
        <?php   } ?>
    </tbody>
  </table>
</div>