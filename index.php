<?php

require 'model/model.php';
require 'service/helpers.php';

if (isset($_GET) && isset($_GET['submit'])) {
    if ($_GET['author'] == null || $_GET['content'] == null) {
        findAll();
    } else {
        addMessage(arrayValidate($_GET));
        header('Location:./');
        exit();
    }
}
require 'view/default.php';

