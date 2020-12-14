<?php 

$json_data =  file_get_contents('data.json');
$json = json_decode($json_data, true);

foreach($json as $value)
{
    echo $value['email'];
}
?>



