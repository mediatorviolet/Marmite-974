<!-- ____________________________ESPACE INSCRIPTION CUISINIER BY DAV_______________________________________________________________________ -->

<?php
include 'src/libs/fonctions/secure_form_cuisinier.php';
global $validate;
global $inscrire_ok;
global $inscrire_no;
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["Inscrire_Cuisinier"])) {
    secure_form_cuisinier();
}
?>


<div class="container d-flex justify-content-center mt-3  mb-3">
    <h2>CUISINIER</h2>
</div>


<?php if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["Inscrire_Cuisinier"])) : ?>
    <?= $validate == true ? "<div class=\"container col-4  alert-success d-flex justify-content-center mt-3  mb-3\">" . $inscrire_ok . "</div"
        : "<div class=\"container col-4  alert-danger d-flex justify-content-center mt-3  mb-3\">" . $inscrire_no . "</div>"; ?>
<?php endif ?>

<!-- VALUE sert a recuperer les post traiter en amont et les reafficher dans le champs. Evite à l'utilisateur de tout re ecrire 
par sécurité on preferera que l'utilisateur retape son mot de passe à chaque fois pour la confirmation -->
<div class="form-cuisinier container col-8 pb-5">

    <form method="POST" action="" class="form" id="Form_cuisinier">

        <div class="row mb-3 ml-5">
            <label for="Nom_Cuisinier" class="col-sm-2 col-form-label">Nom* : </label>

            <div class="col-sm-8">
                <input type="text" class="form-control" id="Nom_Cuisinier" name="Nom_Cuisinier" placeholder="Nom" value="<?= $Nom_Cuisinier ?>" pattern="[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
                <span><?= $Nom_Cuisinier_Err ?></span>

                <span><?= $erreur ?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Prenom_Cuisinier" class="col-sm-2 col-form-label">Prénom* :</label>
            <div class="col-sm-8"> <input type="text" class="form-control" id="Prenom_Cuisinier" name="Prenom_Cuisinier" placeholder="Prénom" value="<?= $Prenom_Cuisinier ?>" required pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
                </input>
                <span><?= $Prenom_Cuisinier_Err ?></span>
            </div>
        </div>


        <div class="mb-3 row">
            <label for="Email_Cuisinier" class="col-sm-2 col-form-label">E-mail* : </label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="Email_Cuisinier" name="Email_Cuisinier" placeholder="Ex : Pierre-Giraud@gmail.com" value="<?= $Email_Cuisinier ?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                </input>
                <span><?= $Email_Cuisinier_Err ?></span>



            </div>
        </div>

        <div class="mb-3 row">
            <label for="Password_Cuisinier" class="col-sm-2 col-form-label">Mot de passe* : </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="Password_Cuisinier" name="Password_Cuisinier" placeholder="Choisissez un mot de passe">
                </input>
                <span><?= $Confirmation_Pass_Cuisinier_Err ?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Confirmation_Pass_Cuisinier" class="col-sm-2 col-form-label">Confirmation* : </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="Confirmation_Pass_Cuisinier" name="Confirmation_Pass_Cuisinier" placeholder="Confirmez votre mot de passe">
                <span><?= $Confirmation_Pass_Cuisinier_Err ?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Specialite_Cuisinier" class="col-sm-2 col-form-label">Spécialité : </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Specialite_Cuisinier" name="Specialite_Cuisinier" placeholder="Ex: Bonbon à la salade" value="<?= $Specialite_Cuisinier ?>">
                <span><?= $Specialite_Cuisinier_Err ?></span>


            </div>
        </div>

        <div class="col-sm-10 offset-2">
            <button type="submit" name="Inscrire_Cuisinier" class="btn btn-warning px-4">S'inscrire</button>
        </div>
        <div class="form-group row">
            <label for="id_cuisinier" class="col-md-3 col-form-label font-weight-bold"></label>
            <div class="col-md-9">
                <input type="hidden" class="form-control" id="id_cuisinier" name="id_cuisinier">
            </div>
        </div>
    </form>

    <div class="col-sm-8 offset-2">
        <p><i>(Les champs présentant le symbole * sont obligatoires.)</i></p>
    </div>
</div>