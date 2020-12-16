<?php

function img_upload()
{
    $fileName = $_FILES["image"]["name"];
    if ($fileName !== "") { // On vérifie que la variable img n'est pas vide
        $validExt = array(".jpg", ".jpeg", ".png", ".gif");
        
        $fileError = $_FILES["image"]["error"]; // serie de tests sur l'image
        switch ($fileError) {
            case UPLOAD_ERR_INI_SIZE:
                echo "Exceeds max size in php.ini";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "Exceeds max size in html form";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No file was uploaded";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo "No /tmp dir to write to";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo "Error writing to disk";
                break;
            default:
                echo "No error was faced! Phew!";
                break;
        }
        if ($_FILES["image"]["size"] > 5000000000000000) { // check la taille de l'image
            echo "Le ficher est trop lourd.";
            die;
        }
        $fileExt = strtolower(substr(strrchr($fileName, '.'), 1)); // check les extensions autoriséés
        if (!in_array("." . $fileExt, $validExt)) {
            echo "Une image valide est une image .jpg, .jpeg. png ou .gif.";
            die;
        }
        $tmp_name = $_FILES["image"]["tmp_name"];
        $idName = md5(uniqid(rand(), true)); // id unique généré lors de l'upload dans le dossier
        $name = basename($_FILES["image"]["name"]); 
        $target_dir = "src/ressources/images/uploads/" . $name;  
        $_POST['image'] = $name;
        move_uploaded_file($tmp_name, "$target_dir"); //deplace l'image dans le dossier indiqué
    } else {
        $_POST["image"] = "src/ressources/images/logo-marmite974.png"; //image par défaut
    }
}
?>