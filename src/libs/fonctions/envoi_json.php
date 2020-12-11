<?php

// fonction d'envoi des données sur le fichier json adéquat

function ajout_data()
{

    // d'abord verifier si la validation du formulaire est ok ( en attendant verif avec isset sur un bouton du formulaire d'ajout utilisateur )

    if (isset($_POST["Inscrire_Particulier"]))

    {
        //recuperer les données du formulaire via $_POST
        foreach ($_POST as $key => $value) {
            // test si ok
            echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
            // test ok
            $data_file = '../DB/utilisateur.json';
            file_put_contents($data_file, json_encode($value));
            
           
        }
    }

}
ajout_data();
?>