<?php

require 'model/model.php';
require 'service/helpers.php';

// On détermine sur quelle page on se trouve
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}
// On calcule la totalité de messages en bdd
$nb_messages = countAllMessages();
// On détermine le nombre de messages par page
$parPage = 10;
// On calcule le nombre de pages nécessaires pour afficher tous les messages
$pages = ceil($nb_messages / $parPage) === 0 ? 1 : ceil($nb_messages / $parPage);
// Calcul du 1er message de la page
$premier = ($currentPage * $parPage) - $parPage;


try {
    if (isset($_GET)) {
        $errors = isValidForm($_GET);
        if (isset($_GET['action'])) {
            if (isset($_GET['id']) && $_GET['action'] == 'update') {
                $message = findOne($_GET['id']);
            }
            if (isset($_GET['id']) && $_GET['action'] == 'delete') {
                deleteMessage($_GET['id']);
                if ($premier){
                    exit(header('Location:./index.php?page=' . $pages));                
                } else {
                    $pages--;
                    exit(header('Location:./index.php?page=' . $pages));
                }
            }
        }
        if (isset($_GET['submit'])) {
            if (isset($_GET['id']) && $_GET['submit'] == 'Modifier') {
                updateMessage($_GET);
                exit(header('Location:./index.php?page=' . $pages));
            }
            if ($_GET['author'] != null && $_GET['content'] != null && $_GET['submit'] == 'Submit') {
                addMessage($_GET);
                exit(header('Location:./index.php?page=' . $pages));
            }
        }
    }
    $tab = messagePaginator($premier, $parPage);
} catch (PDOException $e) {
    $ex = 'Erreur : ' . $e->getMessage();
    require 'view/exception.php';
}

require 'view/default.php';
