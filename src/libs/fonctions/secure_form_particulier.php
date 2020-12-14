



<?php include "src/libs/fonctions/envoi_json.php";
// ****************************SECURISATION FORMULAIRE INSCPRIPTION PARTICULIER************************************************



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
$Nom_Particulier = $Prenom_Particulier = $Email_Particulier = $Password_Particulier = $Confirmation_Pass_Particulier = $Telephone_Particulier = "";

$Nom_Particulier_Err = $Prenom_Particulier_Err = $Email_Particulier_Err = $Password_Particulier_Err = $Confirmation_Pass_Particulier_Err = $Telephone_Particulier_Err = "";

$erreur = "";
$email = "";



function secure_form_particulier()
{
    $inscrire_ok="";
    $inscrire_no="";

    $validate = NULL;
    global $erreur, $email, $color, $validate,  $inscrire_no, $inscrire_ok;


    global  $Email_Particulier, $Nom_Particulier, $Prenom_Particulier, $Password_Particulier, $Confirmation_Pass_Particulier, $Telephone_Particulier;

    global  $Email_Particulier_Err, $Nom_Particulier_Err, $Prenom_Particulier_Err, $Password_Particulier_Err, $Confirmation_Pass_Particulier_Err, $patternEmail_Particulier, $patternNom_Particulier, $patternPrenom_Particulier, $Telephone_Particulier_Err;



    if (isset($_POST['Inscrire_Particulier'])) {
        //traitements des POST et stockage dans des variables à utiliser.
        $Nom_Particulier = trim(stripslashes(htmlspecialchars($_POST['Nom_Particulier'])));
        $Prenom_Particulier = trim(stripslashes(htmlspecialchars($_POST['Prenom_Particulier'])));
        $Email_Particulier = trim(stripslashes(htmlspecialchars($_POST['Email_Particulier'])));
        $Password_Particulier = sha1(htmlspecialchars($_POST['Password_Particulier']));
        $Confirmation_Pass_Particulier = sha1(htmlspecialchars($_POST['Confirmation_Pass_Particulier']));
        $Telephone_Particulier =  (stripslashes(htmlspecialchars($_POST['Telephone_Particulier'])));

        //strlen compte le nombre de caratèere dans la varible saisie
        //$Telephone_Particulier_Lenght = strlen($Specialite_Cuisinier);
        $patternEmail_Particulier = '~/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/igm~';
        $patternNom_Particulier = "#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$#";
        $email = $Email_Particulier;
        $patternPrenom_Particulier = "#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$#";
        $pattern_Telephone = "#0[1-68][0-9]{8}#";

        $color = "";


        // ****************POUR UN OU POUR TOUT CHAMPS VIDE ON BLOQUE L'ENVOI*****************************************************/
        //1 condition (TOUT -> operateur ET : &&) champs vide alors bloqué par erreur



        if (empty($_POST['Nom_Particulier'])  || empty($_POST['Prenom_Particulier'])  || empty($_POST['Email_Particulier'])  || empty($_POST['Password_Particulier'])  || empty($_POST['Confirmation_Pass_Particulier'])  || empty($_POST['Telephone_Particulier'])) {
            //(8)verifie CAS PAR CAS si vide alors on bloqué par erreu
          
            if (empty($_POST["Nom_Particulier"])) {
                $Nom_Particulier_Err = "<i><font color=red >Veuillez entrer votre Nom.</font></i>";
                $validate = false;
            }
            if (empty($_POST["Prenom_Particulier"])) {
                $Prenom_Particulier_Err = "<i><font color = red>Veuillez entrer votre Prénom.</font></i>";
                $validate = false;
            }
            if (empty($_POST["Email_Particulier"])) {
                $Email_Particulier_Err = "Veuillez entrer une adresse email valide.";
                $validate = false;
            }
            if (empty($_POST["Password_Partiulier"])) {
                $Password_Particulier_Err = "<i><font color = red >Indiquez un mot de passe.</font></i>";
                $validate = false;
            }
            if (empty($_POST["Confirmation_Pass_Partiulier"])) {
                $Confirmation_Pass_Particulier_Err = "<i><font color = red >Confirmez le mot de passe.</font></i>";
                $validate = false;
            }

            if (empty($_POST["Telephone_Cuisinier"])) {
                $Confirmation_Pass_Particulier_Err = "<i><font color = red >Confirmez le mot de passe.</font></i>";
                $validate = false;
                $Telephone_Particulier="00 00 00 00 00 ";
            }
            //assignation numérique par defauts pour respecter le pattern et evité bus d envoi

            //fin condition 2





            if (isset($_POST['Nom_Particulier'])  || isset($_POST['Prenom_Particulier'])  || isset($_POST['Email_Particulier']) || isset($_POST['Password_Particulier'])  || isset($_POST['Confirmation_Pass_Particulier'])  || isset($_POST['Telephone_Particulier'])) {


                if (preg_match($pattern_Telephone, $Telephone_Particulier)) {
                    $validate = true;
                } else {

                    $Telephone_Particulier_Err = "Numéro non valide";
                    $erreur = "Numéron non valide";
                    $validate = false;
                }

                if (preg_match($patternNom_Particulier, $Nom_Particulier)) {
                    $Nom_Particulier_Err = "<i><font color=green>Valid name &#10003;</font></i>";
                    $validate = true;
                } else {
                    $erreur = "Veuillez inscrire votre Nom.";
                    $Nom_Particulier_Err = "<i><font color=red> Mauvaise syntaxe. </font></i>";
                    $validate = false;
                }


                if (preg_match($patternPrenom_Particulier, $Prenom_Particulier)) {
                    $Prenom_Particulier_Err = "<i><font color=green>Valid firstName &#10003;</font></i>";
                    $validate = true;
                } else {
                    $erreur = "Saisir un Prénom valide";
                    $Nom_Particulier_Err = "<i><font color=red> Prénom incorrect.</font></i>";
                    $validate = false;
                }

                if(preg_match($pattern_Telephone, $Telephone_Particulier))
                {
                    $validate = true;
                }
                else
                {
                    $validate = false;
                }


                if (ValidEmail($email)) //verif pattern email coté serveur
                {
                    $Email_Particulier_Err = " <i><font color=green> Email valid &#10003;</font></i>";
                    $validate = true;
                } else {
                    $erreur = "Saisir un email valid";
                    $Nom_Particulier_Err = "<i><font color=red> Email incorrect.</font></i>";
                    $validate = false;
                }


                if ($Password_Particulier == $Confirmation_Pass_Particulier) {
                    $validate = true;
                } else {
                    $Confirmation_Pass_Particulier_Err = "<i><font color=red> Ne correspondent pas</font></i>";
                    $erreur = " Vos mots de passe ne sont pas identiques";
                    $validate = false;
                }

                
            


         
            }
            if ($validate === true  ) {
                ajout_json();
                $inscrire_ok="Votre compte particulier a bien été creer.";
            }
            else {
                $inscrire_no="Inscription non aboutie.";
                }
        }
    }
};
