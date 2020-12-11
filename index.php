<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marmite 974</title>
    

<!--CDN BOOSTSRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<?php
    session_start();

    if (!isset($_SESSION["cuisinier"])) {
        $_SESSION["cuisinier"] = false;
    }
    if (!isset($_SESSION["particulier"])) {
        $_SESSION["particulier"] = false;
    }
?>
    <?php include 'src/include/header.php'?>

    <?php $page_ok = array(
        "#" => "homepage.php",
        "tableau_cuisinier" => "tableau_cuisinier.php",
        "form_ajout" => "form_ajout.php",
        "espace_perso" => "espace_perso.php",
        "form_particulier" => "form_particulier.php",
        "form_cuisinier" => "form_cuisinier.php"
    );
    if (isset($_GET["page"]) and isset($page_ok[$_GET["page"]])) {
        $page = $_GET["page"];
        include ("src/pages/" . $page_ok[$page]);
    } else {
        include "src/pages/homepage.php";
    } ?>

    <?php include "src/include/footer.php" ?>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>








