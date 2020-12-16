<?php
include "src/libs/fonctions/envoi_json.php";

$class_alert = "";
$msg_alert = "";
$Nom_Particulier = $Prenom_Particulier = $Email_Particulier = $Telephone_Particulier = "";
$Nom_Particulier_Err = $Prenom_Particulier_Err = $Email_Particulier_Err = $Password_Particulier_Err = $Confirmation_Pass_Particulier_Err = "";
function validationForm()
{
    global $class_alert;
    global $msg_alert;
    global  $Email_Particulier, $Nom_Particulier, $Prenom_Particulier, $Telephone_Particulier;
    global $Nom_Particulier_Err, $Prenom_Particulier_Err, $Email_Particulier_Err, $Password_Particulier_Err, $Confirmation_Pass_Particulier_Err;
    $count = 0;
    $required_input = ["Nom_Particulier", "Prenom_Particulier", "Email_Particulier", "Password_Particulier", "Confirmation_Pass_Particulier"];
    
    foreach ($required_input as $input) {
        if (empty($_POST["$input"])) {
            $count++;
            $Nom_Particulier_Err = "Veuillez entrer un nom.";
            $Prenom_Particulier_Err = "Veuillez entrer un prénom";
            $Email_Particulier_Err = "Veuillez entrer un email.";
            $Password_Particulier_Err = "Veuillez entrer un mot de passe";
            $Confirmation_Pass_Particulier_Err = "Veuillez confirmer votre mot de passe.";
            $class_alert = "alert-danger";
        } else {
            $_POST["$input"] = trim($_POST["$input"]);
            $_POST["$input"] = stripslashes($_POST["$input"]);
            $_POST["$input"] = htmlspecialchars($_POST["$input"]);
        }
    }

    $Email_Particulier = $_POST["Email_Particulier"];
    $Prenom_Particulier = $_POST["Prenom_Particulier"];
    $Nom_Particulier = $_POST["Nom_Particulier"];

    if (!empty($_POST["Telephone_Particulier"])) {
        $Telephone_Particulier = trim(stripslashes(htmlspecialchars($_POST["Telephone_Particulier"])));
    }
    if ($_POST["Password_Particulier"] != $_POST["Confirmation_Pass_Particulier"]) {
        $count++;
        $Password_Particulier_Err = "Les mots de passes sont différents.";
        $Confirmation_Pass_Particulier_Err = "Les mots de passes sont différents.";
        $class_alert = "alert-danger";
    }
    if (doublonEmail() == false) {
        $count ++;
        $Email_Particulier_Err = "Cet email est déjà utilisé.";
    }
    if ($count > 0) {
        $class_alert = "alert-danger";
        $msg_alert = "Un problème est survenu.";
    } else {
        $class_alert = "alert-success";
        $msg_alert = "Compte créé avec succés.";
        ajout_json();
    }
}

// fonction verification doublon email
function doublonEmail()
{
    $data_cuisinier = 'src\libs\DB\cuisinier.json';
    $data_utilisateur = "src/libs/DB/utilisateur.json";
    $tab_cuisinier = json_decode(file_get_contents($data_cuisinier), true);
    $tab_utilisateur = json_decode(file_get_contents($data_utilisateur), true);
    //$count = 0;

    foreach ($tab_cuisinier as $key => $value) {
        if ($_POST['Email_Particulier'] == $value['email']) {
            return false;
        } else {
            return true;
        }
    }
    foreach($tab_utilisateur as $key => $value) {
        if ($_POST["Email_Particulier"] == $value["email"]) {
            return false;
        } else {
            return true;
        }
    }
}