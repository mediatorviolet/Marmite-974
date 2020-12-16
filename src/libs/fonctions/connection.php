<?php
// fonction research avec 2 paramètres ( ici l'index du tableau et la ligne correspondante à l'intérieur du tableau) s'il trouve une correspondance avec le 3 parametre indiqué lorsque foreach parcourt les tableaux, renvoi $key
function research($array, $something, $clef)
{
    foreach ($array as $key => $val) {
        if ($val[$clef] == $something) {
            return $key;
        }
    }
}

// la fonction verifie si les informations correspondent à un utilisateur ou a un cuisinier dans les bases de données correspondantes
function connection()
{
    $data_cuisinier = "src/libs/DB/cuisinier.json";
    $array_cuisinier = json_decode(file_get_contents($data_cuisinier), true);
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["connexion"])) {
        $cle = research($array_cuisinier, $_POST["email"], "email");
        if ($cle) {
            if ($_POST["password"] == $array_cuisinier[$cle]["password"]) {
                $_SESSION["cuisinier"] = $array_cuisinier[$cle]; // Les infos du compte sont temporairement stockées dans $_SESSION
                header("Location: index.php?page=tableau_cuisinier");
            }
        }
    }

    $data_particulier = "src/libs/DB/utilisateur.json";
    $array_particulier = json_decode(file_get_contents($data_particulier), true);
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["connexion"])) {
        $cle = research($array_particulier, $_POST["email"], "email");
        if ($cle) {
            if ($_POST["password"] == $array_particulier[$cle]["password"]) {
                $_SESSION["particulier"] = $array_particulier[$cle]; // Les infos du compte sont temporairement stockées dans $_SESSION
                header("Location: index.php?page=espace_perso");
            }
        }
    }
// suppression des données stockées dans session lors de la deconnexion et renvoi vers la page d'acceuil
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["deconnexion"])) {
        $_SESSION["cuisinier"] = false;
        session_destroy();
        header("Location: index.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["deconnexion"])) {
        $_SESSION["particulier"] = false;
        session_destroy();
        header("Location: index.php");
    }
}
