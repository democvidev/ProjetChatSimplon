<?php
require 'view/default.php';

if(isset($_GET['sub']) && $_GET['sub'] !== null){
    addMessage($_GET);
    showAllMessages();
} 
