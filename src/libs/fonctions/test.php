


<?php 
// **************************SECURISATION FORMULAIRE INSCRIPTION CUISINIER


function DoublonEmail()
{
    $json_data =  file_get_contents('src\libs\DB\cuisinier.json');
    $json_tab = json_decode($json_data, true);
    
    foreach($json_tab as $value)
    {
        if  ( $_POST['email'] = $value['email'] )  {
            echo "Cette adresse est déjà utilisée";
            $validate = false;
        }
        else
        {
            echo "ADRESSE OK";
        }
    }
}

            // verification doublon email 



           
           