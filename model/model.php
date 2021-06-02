<?php
function getDBConnection(): PDO
{
    // Couche d'accès au données
    $user = "root";
    $pass = "";
    $dbname = "bd_chat_simplon";
    $host = 'localhost';

    // Mise en place d'un système de déroutage et gestion d'exeptions

    try {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
        $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
        $dbh = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $dbh;
}


function findAll(): array
{
    $dbh = getDBConnection();
    $query = 'SELECT * FROM messages ORDER BY date DESC LIMIT 5';
    $req = $dbh->prepare($query);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $tab = $req->fetchAll();
    $req->closeCursor();
    // var_dump($tab);
    // die();
    return $tab;
}

function addMessage(array $data): void
{
    extract($data);
    // print_r($data);
    // die;
    $dbh = getDBConnection();
    $query = 'INSERT INTO messages(author, content, date) VALUES(:author, :content, Now())';
    $req = $dbh->prepare($query);
    $req->execute([
        'author' => $author,
        'content' => $content
    ]);
}
