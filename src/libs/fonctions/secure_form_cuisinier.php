



<?php include "src/libs/fonctions/envoi_json.php";
// ****************************SECURISATION FORMULAIRE INSCPRIPTION Cuisinier************************************************



function ValidEmail($email)
{
    if (preg_match("/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i", $email)) {
        return true;
    } else {
        return false;
    }
}

// fonction verification doublon email
function doublonEmail()
{
    if (isset($_POST["Inscrire_Cuisinier"])) {

        $json_data = 'src\libs\DB\cuisinier.json';
        $json_tab = json_decode(file_get_contents($json_data), true);

        foreach ($json_tab as $key => $value) {
            if ($_POST['Email_Cuisinier'] == $value['email']) {
                return false;
            } else {
                return true;
            }
        }
    }
}


//*****************INITIALISATION DES VARS ERREUR ET PATTERN ET TABLEAUX DE VALEUR POUR ANALYSE***************** */
// *************************************************************************************************************/
//********************************************************************************************************** */
$Nom_Cuisinier = $Prenom_Cuisinier = $Email_Cuisinier = $Password_Cuisinier = $Confirmation_Pass_Cuisinier = $Specialite_Cuisinier = "";

$Nom_Cuisinier_Err = $Prenom_Cuisinier_Err = $Email_Cuisinier_Err = $Password_Cuisinier_Err = $Confirmation_Pass_Cuisinier_Err = $Specialite_Cuisinier_Err = "";

$erreur = "";
$email = "";



function secure_form_Cuisinier()
{
    $inscrire_ok = "";
    $inscrire_no = "";


    global $erreur, $email, $color, $validate,  $inscrire_no, $inscrire_ok;


    global  $Email_Cuisinier, $Nom_Cuisinier, $Prenom_Cuisinier, $Password_Cuisinier, $Confirmation_Pass_Cuisinier, $Specialite_Cuisinier;

    global  $Email_Cuisinier_Err, $Nom_Cuisinier_Err, $Prenom_Cuisinier_Err, $Password_Cuisinier_Err, $Confirmation_Pass_Cuisinier_Err, $patternEmail_Cuisinier, $patternNom_Cuisinier, $patternPrenom_Cuisinier, $Specialite_Cuisinier_Err;



    if (isset($_POST['Inscrire_Cuisinier'])) {
        //traitements des POST et stockage dans des variables à utiliser.
        $Nom_Cuisinier = trim(stripslashes(htmlspecialchars($_POST['Nom_Cuisinier'])));
        $Prenom_Cuisinier = trim(stripslashes(htmlspecialchars($_POST['Prenom_Cuisinier'])));
        $Email_Cuisinier = trim(stripslashes(htmlspecialchars($_POST['Email_Cuisinier'])));
        $Password_Cuisinier = (htmlspecialchars($_POST['Password_Cuisinier']));
        $Confirmation_Pass_Cuisinier = (htmlspecialchars($_POST['Confirmation_Pass_Cuisinier']));
        $Specialite_Cuisinier =  (htmlspecialchars($_POST['Specialite_Cuisinier']));

        //strlen compte le nombre de caratèere dans la varible saisie
        //$Specialite_Cuisinier_Lenght = strlen($Specialite_Cuisinier);
        $patternEmail_Cuisinier = '~/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/igm~';
        $patternNom_Cuisinier = "#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$#";
        $email = $Email_Cuisinier;
        $patternPrenom_Cuisinier = "#^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$#";
        $pattern_Specialite = "";

        $color = "";


        // ****************POUR UN OU POUR TOUT CHAMPS VIDE ON BLOQUE L'ENVOI*****************************************************/
        //1 condition (TOUT -> operateur ET : &&) champs vide alors bloqué par erreur



        if (empty($_POST['Nom_Cuisinier'])  || empty($_POST['Prenom_Cuisinier'])  || empty($_POST['Email_Cuisinier'])  || empty($_POST['Password_Cuisinier'])  || empty($_POST['Confirmation_Pass_Cuisinier'])  || empty($_POST['Specialite_Cuisinier'])) {
            //(8)verifie CAS PAR CAS si vide alors on bloqué par erreur

            if (empty($_POST["Nom_Cuisinier"])) {
                $Nom_Cuisinier_Err = "<i><font color=red >Veuillez entrer votre Nom.</font></i>";
                $validate = false;
            }
            if (empty($_POST["Prenom_Cuisinier"])) {
                $Prenom_Cuisinier_Err = "<i><font color = red>Veuillez entrer votre Prénom.</font></i>";
                $validate = false;
            }
            if (empty($_POST["Email_Cuisinier"])) {
                $Email_Cuisinier_Err = "Veuillez entrer une adresse email valide.";
                $validate = false;
            }
            if (empty($_POST["Password_Partiulier"])) {
                $Password_Cuisinier_Err = "<i><font color = red >Indiquez un mot de passe.</font></i>";
                $validate = false;
            }
            if (empty($_POST["Confirmation_Pass_Partiulier"])) {
                $Confirmation_Pass_Cuisinier_Err = "<i><font color = red >Confirmez le mot de passe.</font></i>";
                $validate = false;
            }
            

            // assignation numérique par defauts pour respecter le pattern et evité bus d envoi

            // fin condition 2

            if (isset($_POST['Nom_Cuisinier'])  || isset($_POST['Prenom_Cuisinier'])  || isset($_POST['Email_Cuisinier']) || isset($_POST['Password_Cuisinier'])  || isset($_POST['Confirmation_Pass_Cuisinier'])) {



                if (preg_match($patternNom_Cuisinier, $Nom_Cuisinier)) {
                    $Nom_Cuisinier_Err = "<i><font color=green>Valid name &#10003;</font></i>";
                    $validate = true;
                } else {
                    $erreur = "Veuillez inscrire votre Nom.";
                    $Nom_Cuisinier_Err = "<i><font color=red> Mauvaise syntaxe. </font></i>";
                    $validate = false;
                }


                if (preg_match($patternPrenom_Cuisinier, $Prenom_Cuisinier)) {
                    $Prenom_Cuisinier_Err = "<i><font color=green>Valid firstName &#10003;</font></i>";
                    $validate = true;
                } 
                else 
                {
                    $erreur = "Saisir un Prénom valide";
                    $Nom_Cuisinier_Err = "<i><font color=red> Prénom incorrect.</font></i>";
                    $validate = false;
                }

                /*if (preg_match($pattern_Specialite, $Specialite_Cuisinier)) 
                {
                    $validate = true;
                } else 
                {
                    $validate = false;
                }*/


                if (ValidEmail($email)) //verif pattern email coté serveur
                {
                    $Email_Cuisinier_Err = " <i><font color=green> Email valide &#10003;</font></i>";
                    $validate = true;
                    if (doublonEmail() == true)
                     {
                        $validate = true;
                    } 
                    else 
                    {
                        $validate = false;
                        $Email_Cuisinier_Err = "<i><font color=red >Email déjà utilisé</font></i>";
                    }
                }
                 else 
                {
                    $erreur = "Saisir un email valide";
                    $Nom_Cuisinier_Err = "<i><font color=red> Email incorrect.</font></i>";
                    $validate = false;
                }


                if ($Password_Cuisinier == $Confirmation_Pass_Cuisinier) 
                {
                    $validate = true;
                } 
                else 
                {
                    $Confirmation_Pass_Cuisinier_Err = "<i><font color=red> Les mots de passes ne correspondent pas</font></i>";
                    $erreur = " Vos mots de passe ne sont pas identiques";
                    $validate = false;
                }
            }

            //return $validate;

            if ($validate == true) {
                ajout_json();
                $inscrire_ok = "Votre compte Cuisinier a bien été créé.";
            } else {
                $inscrire_no = "Un problème est survenu.";
            }
        }
    }
};