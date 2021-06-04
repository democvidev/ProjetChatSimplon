<?php

/**
 * Connexion à la base de données
 *
 * @return PDO
 */
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

/**
 * Affichage de messages
 *
 * @return array
 */
function findAll(): array
{
    $dbh = getDBConnection();
    $query = 'SELECT * FROM messages ORDER BY id DESC LIMIT 10';
    $req = $dbh->prepare($query);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $tab = $req->fetchAll();
    $req->closeCursor();
    return $tab;
}

/**
 * Insertion de message avec une requête préparée
 *
 * @param array $data
 * @return void
 */
function addMessage(array $data)
{
    $dbh = getDBConnection();
    $query = 'INSERT INTO messages(author, content, date) VALUES(:author, :content, Now())';
    $req = $dbh->prepare($query);
    $req->bindValue('author', $data['author'], PDO::PARAM_STR);
    $req->bindValue('content', $data['content'], PDO::PARAM_STR);
    $req->execute();
}

/**
 * Modification message
 *
 * @param array $data
 * @return void
 */
function updateMessage(array $data)
{
    $dbh = getDBConnection();
    $query = 'UPDATE messages SET content = :content, author = :author WHERE id =:id';
    $req = $dbh->prepare($query);
    $req->bindValue('author', $data['author'], PDO::PARAM_STR);
    $req->bindValue('content', $data['content'], PDO::PARAM_STR);
    $req->bindValue('id', $data['id'], PDO::PARAM_INT);
    $req->execute();

}

/**
 * Affichage d'un seul message
 *
 * @param integer $message
 * @return array
 */
function findOne(int $message): array
{
    $dbh = getDBConnection();
    $query = 'SELECT * FROM messages WHERE id =:id';
    $req = $dbh->prepare($query);
    $req->bindValue('id', $message, PDO::PARAM_INT);
    $req->execute();
    $row = $req->fetch();
    $req->closeCursor();
    return $row;
}

/**
 * Supprime le message
 *
 * @param integer $message
 * @return void
 */
function deleteMessage(int $message): void
{
    $dbh = getDBConnection();
    $query = 'DELETE FROM messages WHERE id = :id';
    $req = $dbh->prepare($query);
    $req->bindValue('id', $message, PDO::PARAM_INT);
    $req->execute();
    $req->closeCursor();
}
