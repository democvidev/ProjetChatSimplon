<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat service client Amazin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Live chat Amazin</h1>

        <?php

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
                        updateMessage($_GET);
                    }
                    if ($_GET['author'] != null && $_GET['content'] != null && $_GET['submit'] == 'Submit') {
                        addMessage($_GET);
                        header('Location:./index.php');
                        exit();
                    }
                }
            }
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
    
