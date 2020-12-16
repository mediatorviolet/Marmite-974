<?php

require_once "src/libs/fonctions/modification.php";

// si action sur le bouton, on lance les fonctions de validation 
if (isset($_POST['modifier']))
{
  validation_modif();
  img_upload();
}

$json_array = json_decode(file_get_contents("src/libs/DB/atelier.json"), true);
$id = $_POST["id"];

?>

<div class="container-fluid mt-5 form-ajout">
    <h1 class=" text-center" style="font-family:Roboto;">MODIFIER UN ATELIER</h1>




<?php
?> <div class="container-fluid  alert-danger d-flex justify-content-center mt-3  mb-3">
            </div>
<?php

?>


    <form method="POST" enctype="multipart/form-data" class="row g-3 col-9 mx-auto mt-5">
        <div class="col-12 form-floating mb-3">
            <input type="text" class="form-control" id ="titre" name="titre_maj" value="<?= $json_array[$id]["Titre"] ?>" placeholder="" required pattern ="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
            <label for="titre" class="form-label">Titre de l'atelier</label>
            <span class="alert-danger"><?php echo $titre_maj_err; ?></span>
        </div>
        <div class="col-12 form-floating mb-3">
            <textarea type="text-area" class="form-control" id="description" name="description_maj" value="<?= $json_array[$id]["Description"] ?>" placeholder="" required style="height: 150px;"></textarea>
            <span class="alert-danger"><?php echo $description_maj_err; ?></span>
            <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="date" class="form-control"  id="date" name="date_maj" value="<?= $json_array[$id]["Date"] ?>" placeholder="" required pattern="^?(0[1-9]|[12][0-9]|3[01])[\/](0[1-9]|1[012])[\/](19|20)\d\d$">
            <span class="alert-danger"><?php echo $date_maj_err; ?></span>
            <label for="date" class="form-label">Date</label>   
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="time" class="form-control" id="heure_debut" name="heure_maj" value="<?= $json_array[$id]["Heure_debut"] ?>" placeholder="" required pattern="/^(0?[1-9]|1[0-2]):[0-5][0-9]$/"><span class="alert-danger"><?php echo $heure_maj_err; ?></span>
            <label for="heure_debut" class="form-label">Heure de début</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="number" class="form-control" id="duree" name="duree_maj" value="<?= $json_array[$id]["Duree"] ?>" placeholder="" required pattern="[0-9]">
            <span class="alert-danger"><?php echo $duree_maj_err; ?></span>
            <label for="duree" class="form-label">Durée</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="number" class="form-control" id="effectif_max" name="effectif_maj" value="<?= $json_array[$id]["Effectif_max"] ?>" placeholder="" required pattern = "[0-100]">
            <span class="alert-danger"><?php echo $effectif_maj_err; ?></span>
            <label for="effectif_max" class="form-label">Effectif maximum</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="number" class="form-control" id ="prix" name="prix_maj" value="<?= $json_array[$id]["Prix"] ?>" placeholder="" required pattern = "[0-10000]" min="0" max="10000" step="1"><span class="alert-danger"><?php echo $prix_maj_err; ?></span>
            <label for="prix" class="form-label">Prix</label>
        </div>
        <div class="col-md-6 d-flex align-items-center mb-3">
            <label for="image" class="form-label me-3">Image</label>
            <input type="file" class="form-control-lg" id="image" name="image" placeholder=""required >
        </div>
        <div class="col-12 d-flex justify-content-end">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit" name="modifier" class="btn-lg btn-warning px-5">Modifier</button>
        </div>
        <div class="form-group row">
                <label for="id_atelier" class="col-md-3 col-form-label font-weight-bold"></label>
                
            </div>
    </form>
</div>