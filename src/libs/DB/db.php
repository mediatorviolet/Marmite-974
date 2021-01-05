<?php

$msg_val = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["submit"])) {

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=jeux_video;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $bdd->exec('DELETE FROM jeux_video WHERE nom = "Pouet"');

    $msg_val = 'Le jeu a bien été supprimé';
}


?>

<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" style="display: flex; flex-direction: column; width: 25%;">
    <button type="submit" name="submit">Envoyer</button>
</form>
<?= $msg_val; ?>