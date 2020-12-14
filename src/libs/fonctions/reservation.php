<?php

function reservation() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["reservation"])) {
        $data_file = "src/libs/DB/atelier.json";
        $json_array = json_decode(file_get_contents($data_file), true);
        $id = $_POST["id"];
        array_push($json_array[$id]["Participants"], $_SESSION["particulier"]["id"]);
        file_put_contents($data_file, json_encode($json_array));
        $data_utilisateur = "src/libs/DB/utilisateur.json";
        $json_utilisateur = json_decode(file_get_contents($data_utilisateur), true);
        $cle = research($json_utilisateur, $_SESSION["particulier"]["id"], "id");
        array_push($json_utilisateur[$cle]["ateliers"], $json_array[$id]["Id"]);
        file_put_contents($data_utilisateur, json_encode($json_utilisateur));
    }
}