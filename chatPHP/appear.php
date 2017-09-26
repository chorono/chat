<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['chattext'])) {
    try {
        $pdo = new PDO('mysql:dbname=sql_chat_1;host=localhost', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        if (!empty($_POST)) {
        $statement = $pdo->prepare('INSERT INTO chattexts (account, chattext) VALUES (:account, :chattext)');
        $statement->bindValue('account', $_SESSION['account']);
        $statement->bindValue('chattext', $_POST['chattext']);
        $statement->execute();
        }
    } catch (Exception $e) {
        exit($e->getMessage());
    }
}
header('Location: chat.php');
?>