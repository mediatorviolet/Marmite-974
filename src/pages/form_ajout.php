


<!-- DAV liaison à secure_ajout -->
<?php include "src/libs/fonctions/secure_ajout.php";
include "src/libs/fonctions/upload_img.php" ;

if (isset($_POST['Inscrire_Atelier'])) {
    validationAjout();
    img_upload();
}
?>


<div class="container-fluid  form-ajout">
<h2 class="display-4 text-center p-lg-5 p-md-3 py-3" style="font-family:Roboto;">AJOUTER UN ATELIER</h2>


<?php
?> <div class="container-fluid  alert-danger d-flex justify-content-center mt-3  mb-3">
            </div>
<?php

?>


    <form method="POST" action="" enctype="multipart/form-data" class="row g-3 col-9 mx-auto mb-5">
        <div class="col-12 form-floating mb-3">
            <input type="text" class="form-control" name="titre" placeholder="" required pattern ="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
            <label for="titre" class="form-label">Titre de l'atelier</label>
        </div>
        <div class="col-12 form-floating mb-3">
            <textarea class="form-control" name="description" placeholder="" required style="height: 150px;"></textarea>
            <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="date" class="form-control" name="date" placeholder="" required>
            <label for="date" class="form-label">Date</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="time" class="form-control" name="heure_debut" placeholder="" required>
            <label for="heure_debut" class="form-label">Heure de début</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="number" class="form-control" name="duree" placeholder="" required>
            <label for="duree" class="form-label">Durée</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="number" class="form-control" name="effectif_max" placeholder="" required>
            <label for="effectif_max" class="form-label">Effectif maximum</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="number" class="form-control" name="prix" placeholder="" required min="0" max="10000" step="1">
            <label for="prix" class="form-label">Prix</label>
        </div>
        <div class="col-md-6 d-flex align-items-center mb-3">
            <label for="image" class="form-label me-3">Image</label>
            <input type="file" class="form-control-lg" id="image" name="image" required >
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" name="Inscrire_Atelier" class="btn-lg btn-warning px-5">Ajouter</button>
        </div>
        <div class="form-group row">
                <div class="col-md-9">
                    <input type="hidden" class="form-control" id="id_atelier" name="id_atelier">
                </div>
            </div>
    </form>
</div>