<?php include "src/libs/fonctions/connection.php"; 
connection();
?>

<nav class="navbar navbar-expand-lg navbar-light  px-3" style="background-color:#f3671f;">
    <div class="container-fluid">
        <img src="src/ressources/images/logo-marmite974.png" alt="logo" class="img-fluid" style="max-width:75px; border-radius:40px;">
        <a class="navbar-brand ms-3" style="font-family:Roboto; font-size:220%; color:white;" href="index.php">MARMITE 974</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex justify-content-end w-100 mt-md-0 mt-sm-3">
                <?php if ($_SESSION["cuisinier"] == false and $_SESSION["particulier"] == false) { ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-light me-3 px-4 hvr-box-shadow-outset" data-bs-toggle="modal" data-bs-target="#choix_inscription">S'inscrire</button>
                    <!-- Modal -->
                    <div class="modal fade" id="choix_inscription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">S'inscrire en tant que :</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex justify-content-around py-5">
                                    <a href="index.php?page=form_particulier" class="btn btn-warning text-uppercase px-4 hvr-float-shadow">Particulier</a>
                                    <a href="index.php?page=form_cuisinier" class="btn btn-warning text-uppercase px-4 hvr-float-shadow">Cuisinier</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning px-4" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-light px-4 hvr-box-shadow-outset" data-bs-toggle="modal" data-bs-target="#form_connexion">Connexion</button>
                    <!-- Modal -->
                    <div class="modal fade" id="form_connexion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Identification</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" class="col-9 mx-auto">
                                        <div class="row mb-3 form-floating">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="">
                                            <label for="email" class="col-form-label">Email</label>
                                        </div>
                                        <div class="row mb-3 form-floating">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="">
                                            <label for="password" class="col-form-label">Mot de passe</label>
                                            <button type="submit" name="connexion" class="btn btn-warning px-4 mt-3 col-4">Connexion</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        <?php } elseif ($_SESSION["cuisinier"] == true) { ?>
            <a href="index.php?page=tableau_cuisinier" class="nav-link text-light mr-3">Tableau de bord</a>
            <a href="index.php?page=form_ajout" class="nav-link text-light mr-3">Ajouter un atelier</a>
            <form action="<?= connection() ?>" method="POST" class="px-3">
                <button class="btn btn-light my-2 my-sm-0" type="submit" name="deconnexion">Se déconnecter</button>
            </form>
            <?php } elseif ($_SESSION["particulier"] == true) { ?>
            <a href="index.php?page=espace_perso" class="nav-link text-light mr-3">Espace personnel</a>
            <form action="<?= connection() ?>" method="POST" class="px-3">
                <button class="btn btn-light my-2 my-sm-0" type="submit" name="deconnexion">Se déconnecter</button>
            </form>
        <?php } ?>
        </div>
    </div>
</nav>