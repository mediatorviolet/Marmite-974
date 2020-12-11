<div class="container d-flex justify-content-center mt-3  mb-3">
    <h2>CUISINIER</h2>
</div>
<!---DAV 1 PARTICULIER FORMULAIRE INSCRIPTION---->
<!---DAV  1 les ID doivent bien etre dissocier de ceux du formulaire cuisinier pour eviter les doublons dans la récupération des données----->
<!--debut securisation form coté html et sereur--->

<div class="container col-8 pb-5 ">

     <form method="POST" action="" class="form" id="Form_cuisinier">

        <div class="row mb-3 ml-5">
            <label for="Nom_Cuisinier" class="col-sm-2 col-form-label">Nom* : </label>
          
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Nom_Cuisinier" name="Nom_Cuisinier" placeholder="NOM" required pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Prenom_Cuisinier" class="col-sm-2 col-form-label">Prénom* :</label>
            <div class="col-sm-8"> <input type="text" class="form-control" id="Prenom_Cuisinier" name="Prenom_Cuisinier" placeholder="Prénom" required pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
                </input>
            </div>
        </div>


        <div class="mb-3 row">
            <label for="Email_Cuisinier" class="col-sm-2 col-form-label">E-mail* : </label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="Email_Cuisinier" name="Email_Cuisinier" placeholder="Ex : Pierre-Giraud@gmail.com" required pattern = "^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})?">
                </input>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Password_Cuisinier" class="col-sm-2 col-form-label">Mot de passe* : </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="Password_Cuisinier" name="Password_Cuisinier" placeholder="Choisissez un mot de passe" required>
                </input>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Confirmation_Pass_Cuisinier" class="col-sm-2 col-form-label">Confirmation* : </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="Confirmation_Pass_Cuisinier" name="Confirmation_Pass_Cuisinier" placeholder="Confirmez votre mot de passe" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="Specialite_Cuisinier" class="col-sm-2 col-form-label">Spécialité : </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Specialite_Cuisinier"  name="Specialite_Cuisinier" placeholder="Ex: Bonbon à la salade"  pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$">
            </div>
        </div>

        <div class="col-sm-10 offset-2">
    <button type="submit" action="traitement.php" name="Inscrire_Cuisinier" class="btn btn-primary px-4" >S'inscrire</button>
  </div>
        </form>

        <div class="col-sm-8 offset-2"><p><i>(Les champs présentant le symbole * sont obligatoires.)</i></p></div>
</div>




























































