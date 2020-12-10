<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
    <div class="container-fluid">
        <img src="../ressources/images/logo-marmite974.png" alt="logo" class="img-fluid" style="max-width:75px;">
        <a class="navbar-brand text-uppercase ms-3" href="#">Marmite 974</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex justify-content-end w-100 mt-md-0 mt-sm-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary me-3 px-4" data-bs-toggle="modal" data-bs-target="#choix_inscription">S'inscrire</button>
                <!-- Modal -->
                <div class="modal fade" id="choix_inscription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">S'inscrire en tant que :</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex justify-content-around py-5">
                                <button type="button" class="btn btn-primary text-uppercase px-4">Particulier</button>
                                <button type="button" class="btn btn-primary text-uppercase px-4">Cuisinier</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#form_connexion">Connexion</button>
                <!-- Modal -->
                <div class="modal fade" id="form_connexion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Identification</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="col-9 mx-auto">
                                    <div class="row mb-3 form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="">
                                        <label for="email" class="col-form-label">Email</label>
                                    </div>
                                    <div class="row mb-3 form-floating">
                                        <input type="password" class="form-control" id="password" placeholder="">
                                        <label for="password" class="col-form-label">Mot de passe</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary px-4">Connexion</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>