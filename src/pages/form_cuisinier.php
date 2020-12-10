<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<?php include '../include/header.php'?>

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
                <input type="email" class="form-control" id="Email_Cuisinier" name="Email_Cuisinier" placeholder="Ex : Pierre-Giraud@gmail.com" required>
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
                <input type="text" class="form-control" id="Specialite_Cuisinier"  name="Specialite_Cuisinier" placeholder="Ex: Bonbon à la salade"  pattern="^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$"">
            </div>
        </div>

        <div class="col-sm-10 offset-2">
    <button type="submit" action="traitement.php" name="Inscrire_Cuisinier" class="btn btn-primary px-4" >S'inscrire</button>
  </div>
        </form>

        <div class="col-sm-8 offset-2"><p><i>(Les champs présentant le symbole * sont obligatoires.)</i></p></div>
</div>

<!-------------------------------------SECURISATION COTEE SERVEUR-------------------------------------------------->



<?php 


// *** protection XSS ******************************************************************
// *** initialisation des variables pour clarifier le code *****************************

$modele = $_POST['modele'];

$description = $_POST['description'];

$annee = $_POST['annee'];

// *** validations côté serveur ********************************************************
$message = '';
// format attendu : champs obligatoires
if ('' == $modele) {
    $message .= 'Le modèle est requis.<br \>';
}

if ('' == $description) {
    $message .= 'La description est requise.<br \>';
}

// format attendu : longueur des champs
if (!empty($annee) && 4 != mb_strlen($annee)) {

    $message .= 'L\'année, lorsque fournie, doit comporter exactement 4 caractères.<br \>';
}
if (mb_strlen($description) > 100) {
    $message .= 'La description ne doit pas comporter plus de 100 caractères.<br \>';

}

// format attendu : courriel

if (!filter_var( $courriel, FILTER_VALIDATE_EMAIL)) {
    $message .= 'Le courriel n\'est pas valide. Il doit être au format unnom@undomaine.uneextension.<br /> &nbsp; &nbsp; Il doit comporter un seul caractère @.<br /> &nbsp; &nbsp; Ce caractère doit être suivi d\'un nom de domaine qui contient au moins un point puis une extension.<br /> &nbsp; &nbsp; Les caractères spéciaux ne sont pas acceptés.<br \>';
}

// format attendu : code postal canadien
if(!preg_match("/^[ABCEGHJKLMNPRSTVXYabceghjklmnprstvxy][0-9][ABCEGHJKLMNPRSTVWXYZabceghjklmnprstvwxyz] ?[0-9][ABCEGHJKLMNPRSTVWXYZabceghjklmnprstvwxyz][0-9]$/i",$sujet)) {
    $message .= 'Le code postal n\'est pas valide. Il doit être au format A9A 9A9.<br /> &nbsp; &nbsp; Les lettres D, F, I, O, Q et U ne sont pas acceptées.<br /> &nbsp; &nbsp; Les lettres W et Z sont acceptées mais pas en première position.<br \>';
}
 
// données valables : champs numériques
if (!empty($annee) && !ctype_digit($annee)) {

    $message .= 'L\'année, lorsque fournie, doit être un entier.<br \>';
}

//données valables : valeur décimale
if (!empty($rang)) {
    // si on n'a pas besoin de vérifier la valeur maximale, omettre le else
    if (!is_numeric($annee)) {
        $message .= 'Le rang, lorsque fourni, doit être un nombre qui peut comporter une partie décimale.<br \>';
    }
    else {
        // si on vérifie avec l'expression régulière, pas besoin de vérifier le is_numeric()
        if (!preg_match("/^[0-9]{1,3}([.,][0-9]{1,2})?$/", $rang)) {

            $message .= "Le rang, lorsque fourni, doit être au format 999.99";

        }
    }
}

// données valables : clés étrangères

$requete = "...";

// attention : pour être sécuritaire, utiliser une requête préparée
if ($stmt->num_rows == 0) {

    $message = 'Le modèle choisi n\'est pas valide.';

}

if ('' != $message) {
    // *** affichage du message ********************************************************
    echo "<div class='messageerreur'>$message</div>";

    // *** réaffichage du formulaire avec les données qui y ont été saisies ************

} else {
    // *** enregistrement *************************************************************
}


?>
































































<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>