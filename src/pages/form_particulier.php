<?php
include "src/libs/fonctions/valid_form_particulier.php";
global $count;
global $dblCuisinier, $dblParticulier;
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["Inscrire_Particulier"])) {
    validationForm();
}
?>

<div class="container d-flex justify-content-center mt-3  mb-3">

<h2 class="display-4 text-center px-lg-5 py-lg-4 p-md-3 py-0" style="font-family:Roboto;" >PARTICULIER</h2>

</div>

<div class="col-3 text-center mx-auto alert <?= $class_alert ?>"><?= $msg_alert ?></div>

<!--DAV 2 PARTICULIER FORMULAIRE INSCRIPTION-->


<div class="container col-lg-8 col-md-12 col-11 pb-5 form-particulier">

    <form method="POST" action="" class="form" id="Form_Particulier">

        <div class="row mb-3 ml-5">
            <label for="Nom_Particulier" class="col-sm-2 col-form-label">Nom* : </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Nom_Particulier" name="Nom_Particulier" placeholder="Nom" value="<?= $Nom_Particulier ?>" required pattern="[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
                <span class="<?= $class_alert ?>"><?= $Nom_Particulier_Err ?></span>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="Prenom_Particulier" class="col-sm-2 col-form-label">Prénom* :</label>
            <div class="col-sm-8"> <input type="text" class="form-control" id="Prenom_Particulier" name="Prenom_Particulier" placeholder="Prénom" value="<?= $Prenom_Particulier ?>" required pattern="[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
                
                <span class="<?= $class_alert ?>"><?= $Prenom_Particulier_Err ?></span>

            </div>
        </div>
        <div class="mb-3 row">
            <label for="Email_Particulier" class="col-sm-2 col-form-label">E-mail* : </label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="Email_Particulier" name="Email_Particulier" placeholder="Ex : Pierre-Giraud@gmail.com" value="<?= $Email_Particulier ?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                
                <span class="<?= $class_alert ?>"><?= $Email_Particulier_Err ?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Password_Particulier" class="col-sm-2 col-form-label">Mot de passe* : </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="Password_Particulier" name="Password_Particulier" placeholder="Choisissez votre mot de passe">
                
                <span class="<?= $class_alert ?>"><?= $Password_Particulier_Err ?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Confirmation_Pass_Particulier" class="col-sm-2 col-form-label">Confirmation* : </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="Confirmation_Pass_Particulier" name="Confirmation_Pass_Particulier" placeholder="Confirmez votre mot de passe">
                <span class="<?= $class_alert ?>"><?= $Confirmation_Pass_Particulier_Err ?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Telephone_Particulier" class="col-sm-2 col-form-label">Téléphone : </label>
            <div class="col-sm-8">
                <input type="tel" class="form-control" id="Telephone_Particulier" name="Telephone_Particulier" placeholder="Exemple: 06 92 00 00 00" 
                pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" value="<?= $Telephone_Particulier ?>">

            </div>
        </div>

        <div class="col-sm-10 offset-md-2">
            <button type="submit" name="Inscrire_Particulier" class="btn btn-warning px-4 mt-2">S'inscrire</button>
        </div>
        <div class="form-group row">
            <div class="col-md-9">
                <input type="hidden" class="form-control" id="id_particulier" name="id_particulier">
            </div>
        </div>

    </form>
    <div class="col-sm-8 offset-md-2">
        <p><i>(Les champs présentant le symbole * sont obligatoires)</i></p>
    </div>
</div>