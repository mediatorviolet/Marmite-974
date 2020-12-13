<?php

// fonction d'envoi des données sur le fichier json adéquat

function ajout_json()
{

    // d'abord verifier si la validation du formulaire est ok ( en attendant verif avec isset sur un bouton du formulaire d'ajout utilisateur )

//envoi des données des formulaires vers les fichiers json appropriés
    if (isset($_POST['Inscrire_Particulier']))
{    
        $data_file = 'src/libs/DB/utilisateur.json';
        $json_array = json_decode(file_get_contents($data_file), true);
        $id = "p_" . md5(uniqid(rand(), true));
        $_POST["id_particulier"] = $id;
        $particulier_post = array(
            "id" => $_POST["id_particulier"],
            "nom" => $_POST["Nom_Particulier"],
            "prenom" => $_POST["Prenom_Particulier"],
            "email" => $_POST["Email_Particulier"],
            "password" => $_POST["Password_Particulier"],
            "telephone" => $_POST["Telephone_Particulier"],
            "etat" => "actif",
            "ateliers" => array()
        );
        array_unshift($json_array, $particulier_post);
        file_put_contents($data_file, json_encode($json_array));
}

    elseif (isset($_POST['Inscrire_Cuisinier']))
    {            
        $data_file = 'src/libs/DB/cuisinier.json';
        $json_array = json_decode(file_get_contents($data_file), true);
        $id = "c_" . md5(uniqid(rand(), true));
        $_POST["id_cuisinier"] = $id;
        $cuisinier_post = array(
            "id" => $_POST["id_cuisinier"],
            "nom" => $_POST["Nom_Cuisinier"],
            "prenom" => $_POST["Prenom_Cuisinier"],
            "email" => $_POST["Email_Cuisinier"],
            "password" => $_POST["Password_Cuisinier"],
            "specialite" => $_POST["Specialite_Cuisinier"],
            "etat" => "actif",
            "ateliers" => array()
        );
        array_unshift($json_array, $cuisinier_post);
        file_put_contents($data_file, json_encode($json_array));
    }


    elseif (isset($_POST['Inscrire_Atelier']))
    {                
        $data_file = 'src/libs/DB/atelier.json';
        $json_array = json_decode(file_get_contents($data_file), true);
        $id = "a_" . md5(uniqid(rand(), true));
        $_POST["id_atelier"] = $id;
        $atelier_post = array(
            "Id" => $_POST["id_atelier"],
            "Titre" => $_POST["titre"],
            "Description" => $_POST["description"],
            "Date" => $_POST["date"],
            "Heure_debut" => $_POST["heure_debut"],
            "Duree" => $_POST["duree"],
            "Effectif_max" => $_POST["effectif_max"],
            "Prix" => $_POST["prix"],
            "Etat" => "inactif",
            "Auteur" => $_SESSION["cuisinier"]["id"],
            "Participants" => array()
        );
        array_unshift($json_array, $atelier_post);
        file_put_contents($data_file, json_encode($json_array));
    }

    elseif (isset($_POST['Modifier_Atelier']))
    {                
        $data_file = 'src/libs/DB/atelier.json';
        $json_array = json_decode(file_get_contents($data_file), true);
        $json_array = array();
        array_push($json_array, $_POST);
        file_put_contents($data_file, json_encode($json_array));
    }
        

else
{
    //echo "ERROR";
}
    }




//ajout_json();
?>