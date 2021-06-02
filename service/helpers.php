<?php

function validate(string $data): string
{
    $data = trim($data); //supprimer les espaces dans la requête de l'internaute, en début et fin de chaîne
    $data = stripslashes($data);// Supprime les antislashs d'une chaîne
    $data = htmlspecialchars($data); //sécuriser le formulaire contre les failles html
    $data = strip_tags($data); // supprimer les balises html et php dans la requête
    return $data;
}

function arrayValidate(array $arrayData): array
{
    $newArray = [];
    foreach ($arrayData as $key => $row) {
        $data = validate($row);
        $newArray += [$key => $data];
    }
    return $newArray;
}