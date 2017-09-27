<?php
require_once __DIR__ . '/common.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['chattext'])) {
        if (!empty($_POST)) {
        $statement = dbConnect()->prepare('INSERT INTO chattexts (account, chattext) VALUES (:account, :chattext)');
        $statement->bindValue('account', $_SESSION['account']);
        $statement->bindValue('chattext', $_POST['chattext']);
        $statement->execute();
        }

}
header('Location: chat.php');
?>