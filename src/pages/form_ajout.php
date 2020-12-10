<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<?php include "../include/header.php" ?>
<div class="container-fluid mt-5">
    <h1 class="text-uppercase text-center">Ajouter un atelier</h1>
    <form class="row g-3 col-9 mx-auto mt-5">
        <div class="col-12 form-floating mb-3">
            <input type="text" class="form-control" id="titre" placeholder="">
            <label for="titre" class="form-label">Titre de l'atelier</label>
        </div>
        <div class="col-12 form-floating mb-3">
            <textarea type="text-area" class="form-control" id="description" placeholder="" style="height: 150px;"></textarea>
            <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="date" class="form-control" id="date" placeholder="">
            <label for="date" class="form-label">Date</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="time" class="form-control" id="heure_debut" placeholder="">
            <label for="heure_debut" class="form-label">Heure de début</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="number" class="form-control" id="duree" placeholder="">
            <label for="duree" class="form-label">Duree</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="number" class="form-control" id="effectif_max" placeholder="">
            <label for="effectif_max" class="form-label">Effectif maximal</label>
        </div>
        <div class="col-md-6 form-floating mb-3">
            <input type="number" class="form-control" id="prix" placeholder="">
            <label for="prix" class="form-label">Prix</label>
        </div>
        <div class="col-md-6 d-flex align-items-center mb-3">
            <label for="image" class="form-label me-3">Image</label>
            <input type="file" class="form-control-lg" id="image" placeholder="">
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn-lg btn-primary px-5">Ajouter</button>
        </div>
    </form>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>