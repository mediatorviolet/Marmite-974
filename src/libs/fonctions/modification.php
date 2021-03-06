<?php
    $titre_maj_err = $description_maj_err = $duree_maj_err = $effectif_maj_err = $prix_maj_err = $heure_maj_err = $date_maj_err = "";
    $required_input = ["titre_maj", "description_maj", "duree_maj", "effectif_maj","date_maj", "prix_maj", "heure_maj"];
    $class_alert = "";
    $msg_alert = "";

//Vérification des inputs du formulaire

    function validation_modif() {
        global $required_input;
        global $class_alert;
        global $msg_alert;
        $count = 0;
        if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["modifier"])) {
            if (empty($_POST["titre_maj"])) {
                $titre_maj_err = "Veuillez entrer un nom pour votre atelier";
            }
            if (empty($_POST["description_maj"])) {
                $description_maj_err = "Veuillez entrer une description";
            }
            if (empty($_POST["duree_maj"])) {
                $duree_maj_err = "Veuillez entrer une durée";
            }
            if (empty($_POST["date_maj"])) {
                $date_maj_err = "Veuillez entrer une date";
            }
            if (empty($_POST["effectif_maj"])) {
                $effectif_maj_err = "Veuillez entrer un effectif";
            }
            if (empty($_POST["prix_maj"])) {
                $prix_maj_err = "Veuillez entrer un prix";
            }
            if (empty($_POST["heure_maj"])) {
                $heure_maj_err = "Veuillez rentrer une heure";
            }
            foreach ($required_input as $input) {
                if (empty($_POST[$input])) {
                    $count ++;
                } else {
                    $_POST[$input] = trim($_POST[$input]);
                    $_POST[$input] = stripslashes($_POST[$input]);
                    $_POST[$input] = htmlspecialchars($_POST[$input]);
                }
            }
            if ($count > 0) {
                $class_alert = "danger";
                $msg_alert = "Veuillez remplir tous les champs demandés";
            } else {
                $class_alert = "success";
                $msg_alert = "Atelier ajouté avec succès";
                modif_atelier();
            }
        }
    }
    // modifie les données de l'atelier et les stocke dans le fichier json et renvoie sur la page tableau cuisinier
    function modif_atelier() {
        $json_array = json_decode(file_get_contents("src/libs/DB/atelier.json"), true);
        $id = $_POST["id"];
        
        $json_array[$id]["Titre"] = $_POST["titre_maj"];
        $json_array[$id]["Description"] =  $_POST["description_maj"];
        $json_array[$id]["Date"] = $_POST["date_maj"];
        $json_array[$id]["Duree"] = $_POST["duree_maj"];
        $json_array[$id]["Effectif_max"] = $_POST["effectif_maj"];
        $json_array[$id]["Prix"] = $_POST["prix_maj"];
        $json_array[$id]["Heure_debut"] = $_POST["heure_maj"];
        
        file_put_contents("src/libs/DB/atelier.json", json_encode($json_array));
        header("Location: index.php?page=tableau_cuisinier");
    }
    
    function img_upload() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["modifier"])) {
            $json_array = json_decode(file_get_contents("src/libs/DB/atelier.json"), true);
            $id = $_POST["id"];
            $json_array[$id]["Image"] = "src/ressources/images/uploads/" . basename($_FILES["image"]["name"]);
            file_put_contents("src/libs/DB/atelier.json", json_encode($json_array));
        }    
    }
?>