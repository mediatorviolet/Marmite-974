<!-- CSS only -->


<?php include "../include/header.php" ?>
<div class="container-fluid mt-5">
    <h1 class="text-uppercase text-center">Modifier un atelier</h1>
    <form class="row g-3 col-md-9 mx-auto mt-5">
        <div class="col-12 form-floating mb-3">
            <input type="text" class="form-control" id="titre" placeholder="" required pattern ="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
            <label for="titre" class="form-label">Titre de l'atelier</label>
        </div>
        <div class="col-12 form-floating mb-3">
            <textarea type="text-area" class="form-control" id="description" placeholder="" required pattern ="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$" style="height: 150px;"></textarea>
            <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="date" class="form-control" id="date" placeholder="" required pattern = "^?(0[1-9]|[12][0-9]|3[01])[\/](0[1-9]|1[012])[\/](19|20)\d\d$">
            <label for="date" class="form-label">Date</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="time" class="form-control" id="heure_debut" placeholder="" required pattern = "/^(0?[1-9]|1[0-2]):[0-5][0-9]$/">
            <label for="heure_debut" class="form-label">Heure de début</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="number" class="form-control" id="duree" placeholder="" required pattern="[0-9]">
            <label for="duree" class="form-label">Duree</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="number" class="form-control" id="effectif_max" placeholder="" required  pattern = "[0-100]">
            <label for="effectif_max" class="form-label">Effectif maximum</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="number" class="form-control" id="prix" placeholder="" required pattern = "[0-10000]" min="0" max="10000" step="0.01">
            <label for="prix" class="form-label">Prix</label>
        </div>
        <div class="col-md-6 d-flex align-items-center mb-3">
            <label for="image" class="form-label me-3">Image</label>
            <input type="file" class="form-control-lg" id="image" placeholder="" required>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn-lg btn-primary px-5">Modifier</button>
        </div>
    </form>
</div>

<?php include "../include/footer.php" ?>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>