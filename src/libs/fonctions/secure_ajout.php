


<?php 


$erreurAjout = "";







//  servira egelment pour form_modif si possible
function validationAjout () 
{

    global $erreurAjout;
  

    if(isset($_POST['Inscrire_Atelier']))


    
    {//On verifie que chaque input soient bien completes sauf pour l'image pour laquelle on peut ne pas mettre
    $inputsRequired = ["titre", "description", "date", "heure_debut", "duree","effectif_max","prix","image"];
    //pr image sera apres

     

    foreach($inputsRequired as $input){ //Pour chaque elements du tableau on verifie via le $_POSt et le nom de l'input si c'est vide
        if($_POST["$input"] == ""){
            $validationForms = false; //Si oui alors le formulaire n'est pas validé
        }
        else{
         $validationForms = true; //Sinon le formulaire est validé et on passe à la suite
      }
    }

if (isset($_POST['Inscire_Atelier'])){
    $erreurAjout = "test";
}

    //Ici on poursuit si le formulaire est incomplet alors on envoie un message d'erreur et on stop la fonction
    if($validationForms === false){
        echo '
            <div class="col-6 d-flex justify-content-center>    
            <div class="alert alert-danger">Veuillez remplir tous les champs demandés!</div></div>';
    //sinon on va gérer l'image et tester si elle a été ajoutée ou non
    }else{
        // gestion ajout image

        $fileName = $_FILES['image_upload']['name']; //On met dans une variable le nom de l'image pour vérifier si l'utilisateur a ajouté une
            if($fileName !== ""){ //On verifie si cette variable n'est pas vide alors
                $validExt = array('.jpg', '.jpeg', '.gif', '.png'); //On spécifie les extensions que l'on souhaite prendre
                if($_FILES['image_upload']['error'] > 0)//On verifie dans la variable $_FILES s'il n'y a pas d'erreur interne
                {
                    echo '<div class="alert alert-danger">Erreur survenue lors du transfert de l\'image</div>'; //Si oui alors on arrete la fonction et on affiche qu'il y a eu une erreur lors du transfert
                    die;
                }
                $maxSize = 10000000; //On spécifie ici la taille maximale de l'image
                $fileSize = $_FILES['image_upload']['size'];//On recupere via la $_FILES la taille de l'image ajoutée dans l'input
                if($fileSize > $maxSize) //Taille de l'image doit être < à $maxSize
                {
                    echo '<div class="alert alert-danger"> Le fichier est trop lourd !!</div>'; //Si trop lourd alors on envoie le message que le fichier est trop lourd
                    die;
                }
                $fileExt = strtolower(substr(strrchr($fileName, '.'), 1)); //On met en minuscule tout le nom du fichier puis à partir du . on récupère tout ce qu'il y a à la suite soit l'extension et on enregistre dans une nouvelle variable
                if(!in_array("." . $fileExt, $validExt))//On recherche dans le tableau des extensions valides si l'extension du fichier ajouté correspond
                { 
                    echo '<div class="alert alert-danger">Le fichier n\'est pas une image !!</div>';
                    die;
                }

//Arrive ici cela veut dire que nos vérifications on été validées alors on peut procéder à l'envoie de l'image dans son bon dossier
$tmpName = $_FILES['image_upload']['tmp_name']; //On recupère le nom temporaire ajouté par le serveur pour la gestion de l'image
$idName = md5(uniqid(rand(), true)); //On attribue un id unique à l'image via la fonction md5 uniqid et random
$fileDir = "ressources/img/" . $idName . "." . $fileExt; //On spécifie la direction d'enregistrement de l'image
$_POST['image_upload'] = $idName . "." . $fileExt; //On attribue dans la superglobale $_POST le nom de l'image qui ira dans le tableau
$resultat = move_uploaded_file($tmpName, $fileDir);//On utilise la fonction de la superglobale pour transferer le nom temporaire attribué vers le dossier indiqué
//Si le fichier a bien été déplacé alors on ajoute toutes les données dans le tableau et on ajoute les dernieres données necessaires pour une enchere
if($resultat)
{
    //Tout d'abord on attribue un id unique à l'enchere
    $idEnchere = md5(uniqid(rand(), true)); 
    $_POST['id'] = $idEnchere;
    //Attribution de l'etat inactif par défaut d'une enchere
    $_POST['etat'] = 'inactif';
    //On ajoute la propriete date_fin à l'enchere à la valeur null cela permettra d'ajouter lors de l'activation de la carte par l'user
    $_POST['date_fin'] = null;
    //On ajoute le gain à 0
    $_POST['gain'] = 0;
    // On ajoute toutes les valeurs de $_POST dans le tableau de la variable session
    array_push($_SESSION['DUMMY_ARRAY'], $_POST);
    //On envoie le message de confirmation de l'envoie du formulaire et que tout s'est bien passé
    echo 
    '<div class="col-12 d-flex justify-content-center">
        <div class="alert alert-success">Le produit a bien été ajouté !</div>
    </div>';         
}
}else{ //S'il n'y a pas d'image alors on met une image par défaut
$_POST['image_upload'] = "no_image.png";//L'image par défaut se nomme no_image.png
//Tout d'abord on attribue un id unique à l'enchere
$idEnchere = md5(uniqid(rand(), true)); 
$_POST['id'] = $idEnchere;
//Attribution de l'etat inactif par défaut d'une enchere
$_POST['etat'] = 'inactif';
//On ajoute la propriete date_fin à l'enchere à la valeur null cela permettra d'ajouter lors de l'activation de la carte par l'user
$_POST['date_fin'] = null;
//On ajoute le gain à 0
$_POST['gain'] = 0;
//On ajoute dans le tableau global
array_push($_SESSION['DUMMY_ARRAY'], $_POST);
//On confirme que tout s'est bien passé
echo '
<div class="col-12 d-flex justify-content-center">
    <div class="alert alert-success">Le produit a bien été ajouté !</div>
</div>';



            }


        }

}

// fin de if isset





    





}

?>