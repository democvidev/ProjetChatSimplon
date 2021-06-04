<?php

require 'model/model.php';
require 'service/helpers.php';

try {
    if (isset($_GET)) {
        if (isset($_GET['action'])) {
            if (isset($_GET['id']) && $_GET['action'] == 'update') {
                $message = findOne($_GET['id']);
            }
            if (isset($_GET['id']) && $_GET['action'] == 'delete') {
                deleteMessage($_GET['id']);
                header('Location:./index.php');
                exit();
            }
        }
        if (isset($_GET['submit'])) {
            if (isset($_GET['id']) && $_GET['submit'] == 'Modifier') {
                if (isValidForm($_GET) !== []) {
                    $errors = isValidForm($_GET);
                    $tab = findAll();
                    require 'view/default.php';
                    exit();
                }
                updateMessage($_GET);
            }
            if ($_GET['author'] != null && $_GET['content'] != null && $_GET['submit'] == 'Submit') {
                if (isValidForm($_GET) !== []) {                    
                    $errors = isValidForm($_GET);
                    $tab = findAll();                   
                    require 'view/default.php';
                    exit();
                }
                addMessage($_GET);
                header('Location:./index.php');
                exit();
            }
        }
    }
    $tab = findAll();
    $errors = isValidForm($_GET);
} catch (PDOException $e) {
    $ex = 'Erreur : ' . $e->getMessage();
    require 'exception.php';
}

require 'view/default.php';
