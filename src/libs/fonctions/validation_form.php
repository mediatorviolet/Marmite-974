<?php
//require_once 'upload.php';

//initialisation err pour les chamsp inscription CUISINIER
$Nom_Cuisinier_Err = $Prenom_Cuisinier_Err = $Prenom_Cuisinier_Err = $Email_Cuisinier_Err = $Password_Cuisinier_Err = $Confirmation_Pass_Cuisinier_Err = $Specialite_Cuisinier_Err = "";
//initialisation err pour les chamsp inscription PARTICULIER
$Nom_Particulier_Err = $Prenom_Particulier_Err = $Email_Particulier_Err = $Password_Particulier_Err = $Confirmation_Pass_Particulier_Err 
= $Telephone_Particulier_Err = "";

// DAV ( 1 )POUR CUISINIER Vérification des champs vides afin d'éviter les envoie coté serveur meme si les champs sont vides
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Nom_Cuisinier"])) {
        $Nom_Cuisinier_Err = "Veuillez entrer votre nom.";
    }
    if (empty($_POST["Prenom_Cuisinier"])) {
        $Prenom_Cuisinier_Err = "Veuillez entrer votre prénom.";
    }
    if (empty($_POST["Email_Cuisinier"])) {
        $Email_Cuisinier_Err = "Veuillez entrer une adresse email valide.";
    }
    if (empty($_POST["Password_Cuisinier"])) {
        $Password_Cuisinier_Err = "Veuillez inscrire un mot de passe.";
    }
    if (empty($_POST["Confirmation_Pass_Cuisinier"])) {
        $Confirmation_Pass_Cuisinier_Err = "Veuillez inscrire le mot de passe de confirmation.";
    }
    if (empty($_POST["Specialite_Cuisinier"])) {
        $Specialite_Cuisinier_Err = "Veuillez indiquer une spécialité.";
    }
}

// DAV ( 2 )POUR PARTICULIER Vérification des champs vides afin d'éviter les envoie coté serveur meme si les champs sont vides
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Nom_Particulier"])) {
        $Nom_Particulier_Err = "Veuillez entrer votre nom.";
    }
    if (empty($_POST["Prenom_Particulier"])) {
        $Prenom_Particulier_Err = "Veuillez entrer votre prénom.";
    }
    if (empty($_POST["Email_Particulier"])) {
        $Email_Particulier_Err = "Veuillez entrer une adresse email valide.";
    }
    if (empty($_POST["Password_Particulier"])) {
        $Password_Particulier_Err = "Veuillez inscrire un mot de passe.";
    }
    if (empty($_POST["Confirmation_Pass_Particulier"])) {
        $Confirmation_Pass_Particulier_Err = "Veuillez inscrire le mot de passe de confirmation.";
    }
    if (empty($_POST["Telephone_Particulier"])) {
        $Telephone_Particulier_Err = "Veuillez indiquer une numéro de téléphone.";
    }
}


// INITIALISATION DES CLASSE ET MESSAGE D'ALERTE
$class_alert = "";
$msg_alert = "";

// Variables définit en global pour etre accesible à tous le site et que la fonction return les valeurs.
// Déclaration de la fonction.
// La fonction possede tout les posts (form_cuisinier form_paticulier form_ajout form_modif)
function validationForm()
{
    global $class_alert;
    global $msg_alert;
    //Initialisation de count
    $count = 0;
    $required_input = ["nomProduit", "inputPrixLancement", "inputDuree", "inputPrixClic", "inputAugmentationPrix", "inputAugmentationDuree"];
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
        $msg_alert = "Article ajouté avec succès.";
        ajout_produit();
    }
}


function ajout_produit()
{
    // Création d'un id unique pour chaque article
    $id_enchere = "article_" . md5(uniqid(rand(), true));
    $_POST["id"] = $id_enchere;

    // Ajout du de l'article dans le tableau $json_array
    $postArray = array(
        "id" => $id_enchere,
        "titre" => $_POST["nomProduit"],
        "image" => "src/resources/img/uploads/" . basename($_FILES["inputUploadImg"]["name"]),
        "prixLancement" => intval($_POST["inputPrixLancement"]),
        "duree" => intval($_POST["inputDuree"] * 3600),
        "prixClic" => intval($_POST["inputPrixClic"]),
        "augmentationPrix" => intval($_POST["inputAugmentationPrix"]),
        "augmentationDuree" => intval($_POST["inputAugmentationDuree"]),
        "etat" => "inactif",
        "date_fin" => mktime(date("H") + ($_POST["inputDuree"]))
    );

    $data_file = 'src/libs/data.json';
    $json_array = json_decode(file_get_contents($data_file), true);
    array_unshift($json_array, $postArray);
    file_put_contents($data_file, json_encode($json_array));
}

function enchere()
{
    global $data_file;
    global $json_array;
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["encherir"])) {
        $id = $_POST["hint"];
        $json_array = json_decode(file_get_contents($data_file), true);
        (int) $json_array[$id]["prixLancement"] += (int) $json_array[$id]["augmentationPrix"] * 0.01 / count($json_array); // Division par la longueur de $json_array (bug foreach ?)
        (int) $json_array[$id]["date_fin"] += (int) $json_array[$id]["augmentationDuree"] / count($json_array); // Division par la longueur de $json_array (bug foreach ?)
        file_put_contents($data_file, json_encode($json_array));
        header("Location:  index.php#" . $json_array[$id]["id"]);
    }
}

function change_state() {
    global $data_file;
    $id = $_POST["indice"];
    $json_array = json_decode(file_get_contents($data_file), true);
    if ($json_array[$id]["etat"] == "actif") {
        $json_array[$id]["etat"] = "inactif";
        file_put_contents($data_file, json_encode($json_array));
        header("Location:  admin.php?page=dashboard#" . $json_array[$id]["id"]);
    } else if ($json_array[$id]["etat"] == "inactif") {
        $json_array[$id]["etat"] = "actif";
        file_put_contents($data_file, json_encode($json_array));
        header("Location:  admin.php?page=dashboard#" . $json_array[$id]["id"]);
    }
    /*if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["state"])) {
    }*/
}
?>