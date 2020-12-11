<?php
function connection() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["connexion"])) {
        if ($_POST["email"] == "cuisinier@test.fr" and $_POST["password"] == "test") {
            $_SESSION["cuisinier"] = true;
            header("Location: index.php?page=tableau_cuisinier");
        }

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["connexion"])) {
        if ($_POST["email"] == "particulier@test.fr" and $_POST["password"] == "test") {
            $_SESSION["particulier"] = true;
            header("Location: index.php?page=espace_perso");
        }
    }

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