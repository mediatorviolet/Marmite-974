





<!---C'est david qui a ecrit cela ne pas effacer svp, je le ferais .... un jour ....-->

<!---SECURISATION FORMULAIRE COT2 SERVEUR PHP-->



.strip_tags —

Supprime les balises HTML et PHP d'une chaîne

strip_tags() tente de retourner la chaîne string après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. Elle génère des alertes si les balises sont incomplètes ou erronées. Elle utilise le même moteur de recherche que fgetss(). 


allowed_tags

Vous pouvez utiliser ce paramètre optionnel pour spécifier les balises qui ne doivent pas être supprimées. Ils sont soit fournie en tant que chaîne de caractères, ou à partir de PHP 7.4.0, en tant que tableau. Se référer aux examples ci-dessous pour le format de ce paramètre. 




serialize ( mixed $value ) : string


Retourne un tableau en chaine de caractère.

C'est une technique pratique pour stocker ou passer des valeurs PHP entre scripts, sans perdre leur structure ni leur type.

Pour récupérer une variable linéarisée et retrouver une valeur PHP, utilisez unserialize(). 