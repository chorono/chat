<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    session_destroy();
    }
try {
    $pdo = new PDO('mysql:dbname=sql_chat_1;host=127.0.0.1', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    if (!empty($_POST)) {
    $statement = $pdo->prepare('INSERT INTO chattexts (chattext) VALUES (:chattext)');
    $statement->bindValue('chattext', $_POST['chattext']);
    $statement->execute();
    }
} catch (Exception $e) {
    exit($e->getMessage());
}
header('Location: index.php');
?>