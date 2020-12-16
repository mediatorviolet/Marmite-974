<?php
include "src/libs/fonctions/envoi_json.php";

$class_alert = "";
$msg_alert = "";
$Nom_Cuisinier = $Prenom_Cuisinier = $Email_Cuisinier = $Specialite_Cuisinier = "";
$Nom_Cuisinier_Err = $Prenom_Cuisinier_Err = $Email_Cuisinier_Err = $Password_Cuisinier_Err = $Confirmation_Pass_Cuisinier_Err = "";

function validationForm()
{
    global $class_alert;
    global $msg_alert;
    global  $Email_Cuisinier, $Nom_Cuisinier, $Prenom_Cuisinier, $Specialite_Cuisinier;
    global $Nom_Cuisinier_Err, $Prenom_Cuisinier_Err, $Email_Cuisinier_Err, $Password_Cuisinier_Err, $Confirmation_Pass_Cuisinier_Err;
    $count = 0;
    $required_input = ["Nom_Cuisinier", "Prenom_Cuisinier", "Email_Cuisinier", "Password_Cuisinier", "Confirmation_Pass_Cuisinier"];
    
    foreach ($required_input as $input) {
        if (empty($_POST["$input"])) {
            $count++;
            $Nom_Cuisinier_Err = "Veuillez entrer un nom.";
            $Prenom_Cuisinier_Err = "Veuillez entrer un prénom";
            $Email_Cuisinier_Err = "Veuillez entrer un email.";
            $Password_Cuisinier_Err = "Veuillez entrer un mot de passe";
            $Confirmation_Pass_Cuisinier_Err = "Veuillez confirmer votre mot de passe.";
            $class_alert = "alert-danger";
        } else {
            $_POST["$input"] = trim($_POST["$input"]);
            $_POST["$input"] = stripslashes($_POST["$input"]);
            $_POST["$input"] = htmlspecialchars($_POST["$input"]);
        }
    }

    $Email_Cuisinier = $_POST["Email_Cuisinier"];
    $Prenom_Cuisinier = $_POST["Prenom_Cuisinier"];
    $Nom_Cuisinier = $_POST["Nom_Cuisinier"];

    if (!empty($_POST["Specialite_Cuisinier"])) {
        $Specialite_Cuisinier = trim(stripslashes(htmlspecialchars($_POST["Specialite_Cuisinier"])));
    }
    if ($_POST["Password_Cuisinier"] != $_POST["Confirmation_Pass_Cuisinier"]) {
        $count++;
        $Password_Cuisinier_Err = "Les mots de passes sont différents.";
        $Confirmation_Pass_Cuisinier_Err = "Les mots de passes sont différents.";
        $class_alert = "alert-danger";
    }
    if (doublonEmail() == false) {
        $count ++;
        $Email_Cuisinier_Err = "Cet email est déjà utilisé.";
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
        if ($_POST['Email_Cuisinier'] == $value['email']) {
            return false;
        } else {
            return true;
        }
    }
    foreach($tab_utilisateur as $key => $value) {
        if ($_POST["Email_Cuisinier"] == $value["email"]) {
            return false;
        } else {
            return true;
        }
    }
}