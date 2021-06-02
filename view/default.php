<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat service client Amazin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
<h1>Live chat Amazin</h1>

<?php
require 'model/model.php';

try {
    $tab = findAll();
    require 'chat.php';
    require 'form.php';
} catch (PDOException $e) {
    $ex = 'Erreur : ' . $e->getMessage();
    require 'exception.php';
}

?>

</div>
</body>
</html>
    
