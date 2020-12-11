<?php

//require_once 'upload.php';

//initialisation err pour les chamsp inscription CUISINIER
$Nom_Cuisinier_Err = $Prenom_Cuisinier_Err = $Email_Cuisinier_Err = $Password_Cuisinier_Err = $Confirmation_Pass_Cuisinier_Err = $Specialite_Cuisinier_Err = "";
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

// *** validations côté serveur ********************************************************
//** DAV ( 3 )SECURISATION DES REQUETES EVITER LES INJECTIONS SQL OU LE DETOURNEMENT DES REQUETE */

//*********  OBJECTIF******* */ Éviter les injections SQL. Evite l'utilisation de QUOTE qui enleve les '
//QUOTE rend vulnérable les GET ou POST avec de chaine de caractère ET les variables numériques.
//***********SOLUTION********** */
// utilisation de la fonction mysql_real_escape_string — Protège une commande SQL de la présence de caractères spéciaux
//  fonction htmlspecialchars(). Cette fonction va permettre d’échapper certains caractères spéciaux comme les chevrons « < » et « > » en les transformant en entités HTML.
// nettoyer les données avant de les stocker comme trim() qui va supprimer les espaces inutiles et stripslashes() qui va supprimer les antislashes que certains hackers pourraient utiliser pour échapper des caractères spéciaux.
//***************************************** */



 //****************LES FONCTIONS VALIDATION FORM**************************************************************************************** */

// INITIALISATION DES CLASSE ET MESSAGE D'ALERTE
// Variables définit en global pour etre accesible à tous le site et que la fonction return les valeurs.
// Déclaration de la fonction.
// La fonction possede tout les posts (form_cuisinier form_paticulier form_ajout form_modif)

$class_alert = "";
$msg_alert = "";



if(isset ($_POST['Inscrire_Cuisinier'])){

};

function validationForm_Cuisinier()
{
    global $class_alert;
    global $msg_alert;
    //Initialisation de count
    $count = 0;
    $required_input = ["Nom_Cuisinier", "Prenom_Cuisinier", "Email_Cuisinier", "Password_Cuisinier", "Confirmation_Pass_Cuisinier", "Specialite_Cuisinier"];
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
        Inscription_Cuisinier();
    }
}


function validationForm_Particulier()
{
    global $class_alert;
    global $msg_alert;
    //Initialisation de count
    $count = 0;
    $required_input = ["Nom_Particulier", "Prenom_Particulier", "Email_Particulier", "Password_Particulier", "Confirmation_Pass_Particulier", "Telephone_Particulier"];
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
        $msg_alert = "Veuillez remplire tous les champs demandés.";
    } else {
        $class_alert = "success";
        $msg_alert = "Article ajouté avec succès.";
        Inscription_Particulier();
    }
}
//  ************************************LES FONCTIONS INSCRIPTIONS***************************************************************************************************************************************************************************** */
function Inscription_Cuisinier()
{
    // Création d'un id unique pour chaque inscription cuisinier
    $id_cuisinier = "cuisinier_" . md5(uniqid(rand(), true));
    $_POST["id"] = $id_cuisinier;

    // Ajout du de l'article dans le tableau $json_array
    $Post_Array_Cuisinier = array(
        "id" => $id_cuisinier,
        "Nom_Cuisinier" => ($_POST["Nom_Cuisinier"]),
        "Prenom_Cuisinier" => ($_POST["Prenom_Cuisinier"]),
        "Email_Cuisinier" => ($_POST["Email_Cuisinier"]),
        "Password_Cuisinier" => ($_POST["Password_Cuisinier"]),
        "Specialite_Cuisinier" => ($_POST["Specialite_Cuisinier"]),
        "etat" => "inactif",
        
    );
    // A effacer plus tard. test si les post fonctionne
    $Data_File_Cuisinier = 'src/libs/DB/cuisinier.json';
    $Json_Array_Cuisinier = json_decode(file_get_contents($Data_File_Cuisinier), true);
    array_unshift($Json_Array_Cuisinier, $Post_Array_Cuisinier);
    file_put_contents($Data_File_Cuisinier, json_encode($Json_Array_Cuisinier));
}


function Inscription_Particulier()
{
    // Création d'un id unique pour chaque inscription cuisinier
    $id_particulier = "particulier_" . md5(uniqid(rand(), true));
    $_POST["id"] = $id_particulier;

    // Ajout du de l'article dans le tableau $json_array
    $Post_Array_Particulier = array(
        "id" => $id_particulier,
        "Nom_Particulier" => ($_POST["Nom_Particulier"]),
        "Prenom_Particulier" => ($_POST["Prenom_Particulier"]),
        "Email_Particulier" => ($_POST["Email_Particulier"]),
        "Password_Particulier" => ($_POST["Password_Particulier"]),
        "Specialite_Particulier" => ($_POST["Specialite_Cuisinier"]),
        "etat" => "inactif",
        
    );
    // A effacer plus tard. test si les post fonctionne
    $Data_File_Particulier = 'src/libs/DB/utilisateur.json';
    $json_Array_Particulier = json_decode(file_get_contents($Data_File_Particulier), true);
    array_unshift($Json_Array_Particulier, $Post_Array_Particulier);
    file_put_contents($Data_File_Particulier, json_encode($json_Array_Particulier));
}


//test des fonctions inscriptions

if (isset($_POST['Inscrire_Cuisinier'])){
    Inscription_Cuisinier();
}


//  ************************************LES FONCTIONS AJOUT ATELIER***************************************************************************************************************************************************************************** */






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