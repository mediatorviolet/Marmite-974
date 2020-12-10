<!--CUISNIER  RECUPERATIUON ET INJECTION A JSON DES  DONNEES FORMULAIRE INSCRIPTION-->



<!--Une fois que tout est sécurisé coté client et serveur alors :-->
<?php

//apel je json par son chemain d'acces
$DB_cuisinier = '../DB/data/cuisinier.json';

//Si boutton inscire cuisinier cliqué et valaur sont déclaré alors
if (isset($_POST['Inscrire_Cuisinier'])) {
    $data_post_cuisinier = array(
        'Nom_Cuisinier' => $_POST['Nom_Cuisinier'],
        'Prenom_Cuisinier' => $_POST['Prenom_Cuisinier'],
        'Email_Cuisinier ' => $_POST['Email_Cuisinier'],
        'Password_Cuisinier' => $_POST['Password_Cuisinier'],
        'Confirmation_Pass_Cuisinier ' => $_POST['Confirmation_Pass_Cuisinier'],
        'Specialite_Cuisinier' => $_POST['Specialite_Cuisinier'],
    );

//Une fois les vriables avec une valeurs ont doit ouvriri et ecrire dans le json correspondant
$data_post_cuisinier_string = file_get_contents($DB_cuisinier);
$data_post_cuisinier_array = json_decode($data_post_cuisnier_string, true);

array_unshift($data_post_cuisinier_array, $data_stock_post_cuisinier);
file_put_contents($DB_cuisinier, json_encode($data_post_cuisinier_array));


};

?>

<!--PARTICULIER  RECUPERATIUON ET INJECTIONS A JSON DONNEES FORMULAIRE INSCRIPTION-->