<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    session_destroy();
    }

if(!empty($_POST['account']) && !empty($_POST['password'])) {
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
}else {
    $_SESSION['status'] = 'error';
    header('Location: signup.php');
}

try {
    $pdo = new PDO('mysql:dbname=sql_chat_1;host=localhost', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    if (!empty($_POST)) {
    $statement = $pdo->prepare('INSERT INTO accounts (account, pass) VALUES (:account, :pass)');
    $statement->bindValue('account', $_POST['account']);
    $statement->bindValue('pass', $password);
    $statement->execute();
    }
} catch (Exception $e) {
    exit($e->getMessage());
}
$_SESSION['status'] = 'success';
header('Location: signup.php');
?>