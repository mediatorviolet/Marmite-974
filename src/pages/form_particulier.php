
<?php include 'src/libs/fonctions/secure_form_particulier.php';?>

<?php secure_form_particulier() ?>
<?php ajout_json() ?>
<?php doublonEmail() ?>








<div class="container d-flex justify-content-center mt-3  mb-3">

    <h2>PARTICULIER</h2>
  
</div>

<!-- <?php
if (isset($inscrire_ok)) { ?> <div class="container col-4  alert-danger d-flex justify-content-center mt-3  mb-3">
    <?php echo $incrire_ok; ?>
</div>
<?php 
}
?>

  <?php
if (isset($inscrire_no)) { ?> <div class="container col-4  alert-danger d-flex justify-content-center mt-3  mb-3">
<?php echo $incrire_no; ?>
</div>
<?php 
}
?>
     -->
</div>
<!---DAV 2 PARTICULIER FORMULAIRE INSCRIPTION---->


<div class="container col-8 pb-5 form-particulier">

     <form method="POST" action="" class="form" id="Form_Particulier">

        <div class="row mb-3 ml-5">
            <label for="Nom_Particulier" class="col-sm-2 col-form-label">Nom* : </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Nom_Particulier" name="Nom_Particulier" placeholder="Nom"   value="<?= $Nom_Particulier?>" required pattern ="[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
                <span><?= $Nom_Particulier_Err?></span>
               
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Prenom_Particulier" class="col-sm-2 col-form-label">Prénom* :</label>
            <div class="col-sm-8"> <input  type="text" class="form-control" id="Prenom_Particulier" name="Prenom_Particulier" placeholder="Prénom" value = "<?= $Prenom_Particulier ?>" required pattern ="[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
                </input>
                <span ><?= $Prenom_Particulier_Err?></span>
              
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Email_Particulier" class="col-sm-2 col-form-label">E-mail* : </label>
            <div class="col-sm-8">
                <input  type="email" class="form-control" id="Email_Particulier" name="Email_Particulier" placeholder="Ex : Pierre-Giraud@gmail.com"  value = "<?= $Email_Particulier ?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                </input>
                <span ><?= $Email_Particulier_Err?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Password_Particulier" class="col-sm-2 col-form-label">Mot de passe* : </label>
            <div class="col-sm-8">
                <input   type="password" class="form-control" id="Password_Particulier" name="Password_Particulier" placeholder="Choisissez votre mot de passe" value = "<?= $Password_Particulier ?>" >
                </input>
                <span><?= $Password_Particulier_Err?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Confirmation_Pass_Particulier" class="col-sm-2 col-form-label">Confirmation* : </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="Confirmation_Pass_Particulier" name="Confirmation_Pass_Particulier" placeholder="Confirmez votre mot de passe" value = ""  >
                <span><?= $Confirmation_Pass_Particulier_Err?></span>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Telephone_Particulier" class="col-sm-2 col-form-label">Téléphone : </label>
            <div class="col-sm-8">
                <input  type="tel" class="form-control" id="Telephone_Particulier" name="Telephone_Particulier" placeholder="Exemple: 06 92 00 00 00" 
                pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" >
               
            </div>
        </div>

        <div class="col-sm-10 offset-2">
    <button type="submit" action="form_particulier.php" name="Inscrire_Particulier" class="btn btn-primary px-4" >S'inscrire</button>
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

