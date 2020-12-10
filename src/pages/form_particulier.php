<?php include '../include/header.php'?>

<div class="container d-flex justify-content-center mt-3  mb-3">
    <h2>PARTICULIER</h2>
</div>
<!---DAV 2 PARTICULIER FORMULAIRE INSCRIPTION---->
<!---DAV  2 les ID doivent bien etre dissocier de ceux du formulaire cuisinier pour eviter les doublons dans la récupération des données----->
<!--les boutons doivent avoir leurs name  dissocier-->

<div class="container col-8 pb-5 ">

     <form method="POST" action="" class="form" id="Form_Partiiculier">

        <div class="row mb-3 ml-5">
            <label for="Nom_Particulier" class="col-sm-2 col-form-label">Nom* : </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Nom_Particulier" name="Nom_Particulier" placeholder="NOM" required pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Prenom_Particulier" class="col-sm-2 col-form-label">Prénom* :</label>
            <div class="col-sm-8"> <input type="text" class="form-control" id="Prenom_Particulier" name="Prenom_Particulier" placeholder="Prénom" required pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
                </input>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Email_Particulier" class="col-sm-2 col-form-label">E-mail* : </label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="Email_Particulier" name="Email_Particulier" placeholder="Ex : Pierre-Giraud@gmail.com" required>
                </input>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Password_Particulier" class="col-sm-2 col-form-label">Mot de passe* : </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="Password_Particulier" name="Password_Particulier" placeholder="Choisissez votre mot de passe" required>
                </input>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Confirmation_Pass_Particulier" class="col-sm-2 col-form-label">Confirmation* : </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="Confirmation_Pass_Particulier" name="Confirmation_Pass_Particulier" placeholder="Confirmez votre mot de passe" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Telephone_Particulier" class="col-sm-2 col-form-label">Téléphone : </label>
            <div class="col-sm-8">
                <input type="tel" class="form-control" id="Telephone_Particulier" name="Telephone_Particulier" placeholder="06-92-00-01-02" pattern="(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}" min="0" max="99">
            </div>
        </div>

        <div class="col-sm-10 offset-2">
    <button type="submit" action="traitement.php" name="Inscrire_Particulier" class="btn btn-primary px-4" >S'inscrire</button>
  </div>
        </form>
        <div class="col-sm-8 offset-2"><p><i>(Les champs présentant le symbole * sont obligatoires.)</i></p></div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>