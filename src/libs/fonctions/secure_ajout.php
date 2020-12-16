<?php 
include 'src\libs\fonctions\envoi_json.php';


$class_alert = "";
$msg_alert = "";
function validationAjout()
{
    global $class_alert;
    global $msg_alert;
    $count = 0;
    $required_input = ["titre", "description", "date", "heure_debut", "duree", "effectif_max", "prix"];
    foreach ($required_input as $input) {
        if (empty($_POST["$input"])) {
            $count++;
        } else {
            $_POST["$input"] = trim($_POST["$input"]);
            $_POST["$input"] = stripslashes($_POST["$input"]);
            $_POST["$input"] = htmlspecialchars($_POST["$input"]);
        }
    }
    if ($count > 0) {
        $class_alert = "danger";
        $msg_alert = "Veuillez remplir tous les champs demandés.";
    } else {
        $class_alert = "success";
        $msg_alert = "Atelier ajouté avec succès.";
        ajout_json();
    }
}