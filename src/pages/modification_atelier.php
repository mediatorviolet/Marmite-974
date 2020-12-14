<?php
// require_once "src/libs/fonctions/modification.php";
// validation_modif();
// img_upload();

// $json_array = json_decode(file_get_contents("src\libs\DB\atelier.json"), true);
// $id = $_POST["id"];

?>

<div class="container-fluid p-lg-5 p-md-3">
  <h2 class="display-4 text-center p-lg-5 p-md-3 py-3">Modifier un Atelier</h2>
  <div class="col-3 text-center mx-auto alert alert-<?= $class_alert ?>"><?= $msg_alert ?></div>
  <form action="<?= "index.php?page=tableau_cuisinier" ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label class="lead" for="titre">Titre de l'atelier</label>
      <input type="text" class="form-control" id="titre" name="titre_maj" value="<?= $json_array[$id]["titre"] ?>">
      <span class="alert-danger"><?php echo $titre_maj_err; ?></span>
    </div>
    <div class="form-group">
      <label class="lead" for="description">Description</label>
      <input type="text" class="form-control" id="description" name="description_maj">
      <span class="alert-danger"><?php echo $description_maj_err; ?></span>
    </div>
    <div class="form-group">
      <label class="lead" for="image">Ajouter une image</label>
      <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <div class="form-group">
      <label class="lead" for="date">Date</label>
      <input type="date" class="form-control" id="date" name="date_maj">
      <span class="alert-danger"><?php echo $date_maj_err; ?></span>
    </div>
    <div class="form-group">
      <label class="lead" for="duree">Durée</label>
      <input type="number" class="form-control" id="duree" name="duree_maj">
      <span class="alert-danger"><?php echo $duree_maj_err; ?></span>
    </div>
    <div class="form-group">
      <label class="lead" for="effectif_max">Effectif maximum</label>
      <input type="number" class="form-control" id="effectif_max" name="effectif_maj">
      <span class="alert-danger"><?php echo $effectif_maj_err; ?></span>
    </div>
    <div class="form-group">
      <label class="lead" for="prix">Prix</label>
      <input type="number" class="form-control" id="prix" name="prix_maj">
      <span class="alert-danger"><?php echo $prix_maj_err; ?></span>
    </div>
    <div class="form-group">
      <label class="lead" for="heure_debut">heure_debut</label>
      <input type="time" class="form-control" id="heure_debut" name="debut_maj">
      <span class="alert-danger"><?php echo $augmentationDuree_maj; ?></span>
    </div>
    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="submit" name="modifier" class="btn btn-dark">Modifier l'atelier</button>
  </form>
</div>