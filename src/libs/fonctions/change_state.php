
<?php
// fonction switch etat des ateliers
function change_state() {
    $data_file = "src/libs/DB/atelier.json";
    $id = $_POST["indice"];
    $json_array = json_decode(file_get_contents($data_file), true);
    if ($json_array[$id]["Etat"] == "actif") {
        $json_array[$id]["Etat"] = "inactif";
        file_put_contents($data_file, json_encode($json_array));
        //header("Location:  admin.php?page=dashboard#" . $json_array[$id]["id"]);
    } else if ($json_array[$id]["Etat"] == "inactif") {
        $json_array[$id]["Etat"] = "actif";
        file_put_contents($data_file, json_encode($json_array));
        //header("Location:  admin.php?page=dashboard#" . $json_array[$id]["id"]);
    }
}