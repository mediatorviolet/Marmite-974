<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<?php include '../include/header.php'?>

<div class="container d-flex justify-content-center mt-3  mb-3">
    <h2>CUISINIER</h2>
</div>



<!---CUISINIER FORMULAIRE INSCRIPTION---->
<div class="container col-8 pb-5 ">

     <form method="POST" action="" class="form" id="FormCUISINIER">

        <div class="row mb-3 ml-5">
            <label for="NomC" class="col-sm-2 col-form-label">Nom* : </label>
          
            <div class="col-sm-8">
                <input type="text" class="form-control" id="NomCuisinier" placeholder="NOM" required pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="PrenomCuisinier" class="col-sm-2 col-form-label">Prénom* :</label>
            <div class="col-sm-8"> <input type="text" class="form-control" id="PrenomCuisinier" placeholder="Prénom" required pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
                </input>
            </div>
        </div>


        <div class="mb-3 row">
            <label for="EmailCuisinier" class="col-sm-2 col-form-label">E-mail* : </label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="EmailCuisinier" placeholder="Ex : Pierre-Giraud@gamail.com" required>
                </input>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="PasswordCuisinier" class="col-sm-2 col-form-label">Mot de passe* : </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="PasswordCuisinier" placeholder="Mot de passe" required>
                </input>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="ConfirmationPassCuisinier" class="col-sm-2 col-form-label">Confirmation* : </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="ConfirmationPassCuisinier" placeholder="Confirmer votre mot de passe" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="TelephoneCuisinier" class="col-sm-2 col-form-label">Téléphone : </label>
            <div class="col-sm-8">
                <input type="tel" class="form-control" id="TelephoneCuisinier" placeholder="06-92-00-01-02" pattern="(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}">
            </div>
        </div>

        <div class="col-sm-10 offset-2">
    <button type="submit" class="btn btn-primary">ENREGISTRER</button>
  </div>
        </form>


        <div class="col-sm-8 offset-2"><p><i>(Les champs présentant le symbole * sont obligatoire)</i></p></div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>