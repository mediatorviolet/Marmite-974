<?php
// **************************SECURISATION FORMULAIRE INSCRIPTION CUISINIER


function ValidEmail($email)
{
    if (preg_match("/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i", $email)) {
        return true;
    } else {
        return false;
    }
}


//*****************INITIALISATION DES VARS ERREUR ET PATTERN ET TABLEAUX DE VALEUR POUR ANALYSE***************** */
// *************************************************************************************************************/
//********************************************************************************************************** */
$Nom_Cuisinier = $Prenom_Cuisinier = $Email_Cuisinier = $Password_Cuisinier = $Confirmation_Pass_Cuisinier = $Specialite_Cuisinier = "";

$Nom_Cuisinier_Err = $Prenom_Cuisinier_Err = $Email_Cuisinier_Err = $Password_Cuisinier_Err = $Confirmation_Pass_Cuisinier_Err = $Specialite_Cuisinier_Err = "";

$erreur = "";
$email = "";
$error = [];


function secure_form_cuisinier()
{

    global $erreur, $email,
        $patternPrenom_Cuisinier,   $patternSpecialite_Cuisinier, $Specialite_Cuisinier_Lenght;

    global  $Email_Cuisinier, $Nom_Cuisinier, $Prenom_Cuisinier, $Password_Cuisinier, $Confirmation_Pass_Cuisinier, $Specialite_Cuisinier;

    global  $Email_Cuisinier_Err, $Nom_Cuisinier_Err, $Prenom_Cuisinier_Err, $Password_Cuisinier_Err, $Confirmation_Pass_Cuisinier_Err, $patternEmail_Cuisinier, $patternNom_Cuisinier, $patternPrenom_Cuisinier, $Specialite_Cuisinier_Err;



    if (isset($_POST['Inscrire_Cuisinier'])) {
        //traitements des POST et stockage dans des variables à utiliser.
        $Nom_Cuisinier = trim(stripslashes(htmlspecialchars($_POST['Nom_Cuisinier'])));
        $Prenom_Cuisinier = trim(stripslashes(htmlspecialchars($_POST['Prenom_Cuisinier'])));
        $Email_Cuisinier = trim(stripslashes(htmlspecialchars($_POST['Email_Cuisinier'])));
        $Password_Cuisinier = sha1(htmlspecialchars($_POST['Password_Cuisinier']));
        $Confirmation_Pass_Cuisinier = sha1(htmlspecialchars($_POST['Confirmation_Pass_Cuisinier']));
        $Specialite_Cuisinier =  trim(stripslashes(htmlspecialchars($_POST['Specialite_Cuisinier'])));

        //strlen compte le nombre de caratèere dans la varible saisie
        $Specialite_Cuisinier_Lenght = strlen($Specialite_Cuisinier);
        $patternEmail_Cuisinier = '#/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/igm#';
        $patternNom_Cuisinier = "#[A-Z]#";
        $patternSpecialite_Cuisinier = "#([a-z]|[A-Z]|[0-9]){4,8}$#";
        $patternPrenom_Cuisinier = "#[A-Z]#";

        $email = $Email_Cuisinier;

        // ****************POUR UN OU POUR TOUT CHAMPS VIDE ON BLOQUE L'ENVOI*****************************************************/
        //1 condition (TOUT -> operateur ET : &&) champs vide alors bloqué par erreur



        if (empty($_POST['Nom_Cuisinier'])  || empty($_POST['Prenom_Cuisinier'])  || empty($_POST['Email_Cuisinier'])  || empty($_POST['Password_Cuisinier'])  || empty($_POST['Confirmation_Pass_Cuisinier'])  || empty($_POST['Specialite_Cuisinier'])) {
            //(8)verifie CAS PAR CAS si vide alors on bloqué par erreu
            if (empty($_POST["Nom_Cuisinier"])) {
                $Nom_Cuisinier_Err = "Veuillez entrer votre NOM.";
            }
            if (empty($_POST["Prenom_Cuisinier"])) {
                $Prenom_Cuisinier_Err = "Veuillez entrer votre prénom.";
            }
            if (empty($_POST["Email_Cuisinier"])) {
                $Email_Cuisinier_Err = "Veuillez entrer une adresse email valide.";
            }
            if (empty($_POST["Password_Cuisinier"])) {
                $Password_Cuisinier_Err = "<i><font color=red >Veuillez inscrire un mot de passe.</font></i>";
            }
            if (empty($_POST["Confirmation_Pass_Cuisinier"])) {
                $Confirmation_Pass_Cuisinier_Err = "<i><font color=red >Confirmer un mot de passe.</font></i>";
            }
            if (empty($_POST["Specialite_Cuisinier"])) {
               $Specialite_Cuisinier = "";
            }
            //fin condition 2


            if (isset($_POST['Nom_Cuisinier'])  && isset($_POST['Prenom_Cuisinier'])  && isset($_POST['Email_Cuisinier'])  && isset($_POST['Password_Cuisinier'])  && isset($_POST['Confirmation_Pass_Cuisinier'])  && isset($_POST['Specialite_Cuisinier'])) { {

                    if (preg_match($patternNom_Cuisinier, $Nom_Cuisinier)) {
                        $Nom_Cuisinier_Err = "<i><font color=green> Valid Name &#10003; </font></i>";
                    } else {
                        $erreur = "Veuillez inscrire votre NOM en en majuscule.";
                        $Nom_Cuisinier_Err = "<i><font color=red> Majuscule requis.</font></i>";
                    }

                    if (preg_match($patternPrenom_Cuisinier, $Prenom_Cuisinier)) {
                        $Prenom_Cuisinier_Err = "<i><font color=green> Valid Name &#10003; </font></i>";
                    } else {
                        $erreur = "Syntaxe undéfinie";
                        $Prenom_Cuisinier_Err = "<i><font color=red> Ressaisir votre prénom </font></i>";
                    }

                    if (ValidEmail($email)) {
                        $Email_Cuisinier_Err = "<i><font color=green >Valid email &#10003;</font></i>";
                    } else {

                        $Email_Cuisinier_Err = "<i><font color=red >Adresse Email non valide ou de format non reconnue  </font></i>";
                    }

                    if ($Password_Cuisinier != $Confirmation_Pass_Cuisinier) {
                        $Confirmation_Pass_Cuisinier_Err = "<i><font color=red>Ne correspond pas</font>";
                        $erreur = " Vos mots de passe ne sont pas identiques";
                    } else {
                     
                    }

                        //bug au test car empeche envoie. Enlever le mut pour test individuele

                    // if (preg_match($patternSpecialite_Cuisinier, $Specialite_Cuisinier)) {
                    //     $erreur = "jeux de caractères interdit";
                    //     $Specialite_Cuisinier_Err = "<i><font color=red> Syntaxe non autorisée. </font></i>";
                    // } else {

                    //     if ($Specialite_Cuisinier_Lenght  <= 15) {
                    //     } else {
                    //         $erreur = "Entrez moins de 15 caractères pour votre spécialité";
                    //         $Specialite_Cuisinier_Err = "<i><font color=red> Descriptif trop long. Saisir moin de 15 caractères.</font></i>";
                    //     }
                    // }


                }
            }
        }
    }
};
















//***************************************************************************************************************************** */ FIN
