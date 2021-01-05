<?php

function desinscription()
{
    header("Location: index.php?page=espace_perso");
    $data_utilisateur = 'src/libs/DB/utilisateur.json';
    $utilisateur_array = json_decode(file_get_contents($data_utilisateur), true);
    $data_atelier = "src/libs/DB/atelier.json";
    $atelier_array = json_decode(file_get_contents($data_atelier), true);

    $cle = research($utilisateur_array, $_SESSION["particulier"]["id"], "id"); // id de l'utilisateur connecté
    $id_atelier = $_POST["indice"]; // id de l'atelier sur lequel on clique
    $cle_atelier = array_search($id_atelier, $utilisateur_array[$cle]["ateliers"]); // cle de l'atelier dans le tableau utilisateur connecté

    unset($utilisateur_array[$cle]["ateliers"][$cle_atelier]); // unset de l'atelier cliqué dans tableau utilisateur
    file_put_contents($data_utilisateur, json_encode($utilisateur_array));
}