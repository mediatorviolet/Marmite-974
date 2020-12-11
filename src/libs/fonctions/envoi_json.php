<?php

// fonction d'envoi des données sur le fichier json adéquat

function ajout_data()
{

    // d'abord verifier si la validation du formulaire est ok ( en attendant verif avec isset sur un bouton du formulaire d'ajout utilisateur )


    if (isset($_POST['Inscrire_Particulier']))
{    
        $data_file = 'src/libs/DB/utilisateur.json';
        $json_array = json_decode(file_get_contents($data_file), true);
        $id = md5(uniqid(rand(), true));
        $_POST["id_particulier"] = $id;
        array_push($json_array, $_POST);
        file_put_contents($data_file, json_encode($json_array));
}

    elseif (isset($_POST['Inscrire_Cuisinier']))
    {            
        $data_file = 'src/libs/DB/cuisinier.json';
        $json_array = json_decode(file_get_contents($data_file), true);
        $id = md5(uniqid(rand(), true));
        $_POST["id_cuisinier"] = $id;
        array_push($json_array, $_POST);
        file_put_contents($data_file, json_encode($json_array));
    }


    elseif (isset($_POST['Inscrire_Atelier']))
    {                
        $data_file = 'src/libs/DB/atelier.json';
        $json_array = json_decode(file_get_contents($data_file), true);
        $id = md5(uniqid(rand(), true));
        $_POST["id_atelier"] = $id;
        array_push($json_array, $_POST);
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
    echo "ERROR";
}
    }




ajout_data();
?>