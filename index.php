<?php
require 'view/default.php';
if ($_GET) {
    if(isset($_GET['author']) && isset($_GET['content'])){
        // var_dump($_GET);
        // die;
        addMessage($_GET);
        findAll();
    }
} else {
    findAll();
} 
