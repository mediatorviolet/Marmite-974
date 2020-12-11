<?php include 'src/libs/fonctions/envoi_json.php'?>
<?php include 'src/libs/fonctions/validation_form.php';
global $class_alert;
global $msg_alert ;?>

<div class="container d-flex justify-content-center mt-3  mb-3">

    <h2>PARTICULIER</h2>
    <div class="<?= $class_alert ?>"> <?= $msg_alert ?></div> 
</div>
    
</div>
<!---DAV 2 PARTICULIER FORMULAIRE INSCRIPTION---->
<!---DAV  2 les ID doivent bien etre dissocier de ceux du formulaire cuisinier pour eviter les doublons dans la récupération des données----->
<!--les boutons doivent avoir leurs name  dissocier-->

<div class="container col-8 pb-5 form-particulier">

     <form method="POST" action="<?= validationForm_Particulier() ?>" class="form" id="Form_Particulier">

        <div class="row mb-3 ml-5">
            <label for="Nom_Particulier" class="col-sm-2 col-form-label">Nom* : </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Nom_Particulier" name="Nom_Particulier" placeholder="NOM"  pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
                <span><?= $Nom_Particulier_Err?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Prenom_Particulier" class="col-sm-2 col-form-label">Prénom* :</label>
            <div class="col-sm-8"> <input  type="text" class="form-control" id="Prenom_Particulier" name="Prenom_Particulier" placeholder="Prénom" pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
                </input>
                <span><?= $Prenom_Particulier_Err?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Email_Particulier" class="col-sm-2 col-form-label">E-mail* : </label>
            <div class="col-sm-8">
                <input  type="email" class="form-control" id="Email_Particulier" name="Email_Particulier" placeholder="Ex : Pierre-Giraud@gmail.com"  pattern = "^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})?$">
                </input>
                <span><?= $Email_Particulier_Err?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Password_Particulier" class="col-sm-2 col-form-label">Mot de passe* : </label>
            <div class="col-sm-8">
                <input   type="password" class="form-control" id="Password_Particulier" name="Password_Particulier" placeholder="Choisissez votre mot de passe" >
                </input>
                <span><?= $Password_Particulier_Err?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Confirmation_Pass_Particulier" class="col-sm-2 col-form-label">Confirmation* : </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="Confirmation_Pass_Particulier" name="Confirmation_Pass_Particulier" placeholder="Confirmez votre mot de passe" >
                <span><?= $Confirmation_Pass_Particulier_Err?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Telephone_Particulier" class="col-sm-2 col-form-label">Téléphone : </label>
            <div class="col-sm-8">
                <input  type="tel" class="form-control" id="Telephone_Particulier" name="Telephone_Particulier" placeholder="06 92 00 00 00" pattern="^((((\(\d{3}\))|(\d{3}-))\d{3}-\d{4})|(\+?\d{2}((-| )\d{1,8}){1,5}))(( x| ext)\d{1,5}){0,1}$" >
               
            </div>
        </div>

        <div class="col-sm-10 offset-2">
<<<<<<< HEAD
    <button type="submit" action="form_particulier.php" name="Inscrire_Particulier" class="btn btn-primary px-4" >S'inscrire</button>
=======
    <button type="submit"  name="Inscrire_Particulier" class="btn btn-primary px-4" >S'inscrire</button>
>>>>>>> 04b2c2e07b237a06a57017ea45625d5b5813f0f6
  </div>
  <div class="form-group row">
                <label for="id_particulier" class="col-md-3 col-form-label font-weight-bold"></label>
                <div class="col-md-9">
                    <input type="hidden" class="form-control" id="id_particulier" name="id_particulier">
                </div>
            </div>
  
        </form>
        <div class="col-sm-8 offset-2"><p><i>(Les champs présentant le symbole * sont obligatoires.)</i></p></div>
</div>

