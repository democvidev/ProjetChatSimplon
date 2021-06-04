<?php

const MIN_NAME_LENGTH = 2;


/**
 * Traitement des données d'une chaine de caractère
 *
 * @param string $data
 * @return string
 */
function validate(string $data): string
{
    $data = trim($data); //supprimer les espaces dans la requête de l'internaute, en début et fin de chaîne
    $data = stripslashes($data);// Supprime les antislashs d'une chaîne
    $data = htmlspecialchars($data); //sécuriser le formulaire contre les failles html
    $data = strip_tags($data); // supprimer les balises html et php dans la requête
    return $data;
}

/**
 * Traitement des données d'un tableau
 *
 * @param array $arrayData
 * @return array
 */
function arrayValidate(array $arrayData): array
{
    $newArray = [];
    foreach ($arrayData as $key => $row) {
        $data = validate($row);
        $newArray += [$key => $data];
    }
    return $newArray;
}

function isValidForm(array $array): array
{
    $errorMessage = [];
    foreach ($array as $key => $value) {
        if ($key == 'author' && strlen($value) < MIN_NAME_LENGTH) {
            $errorMessage += [ $key => ' Erreur : 
 ce champ doit contenir au moins 2 caractères'];
        }
        if ($key == 'content' && strlen($value) < MIN_NAME_LENGTH) {
            $errorMessage += [ $key => ' Erreur : 
 ce champ doit contenir au moins 2 caractères'];
        }
    }
    return $errorMessage;
}
