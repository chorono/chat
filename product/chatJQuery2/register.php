<?php
require_once __DIR__ . '/common.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['status'] = 'error';
    header('Location: signup.php');
    }
if(inputAuth($_POST['account'],$_POST['password'])){
    if(!accountAuth($_POST['account'])){
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $pdo = dbConnect();
        $statement = $pdo->prepare('INSERT INTO accounts (account, pass) VALUES (:account, :pass)');
        $statement->bindValue('account', $_POST['account']);
        $statement->bindValue('pass', $password);
        $statement->execute();
        $_SESSION['status'] = 'success';
        header('Location: signup.php');
    } else {
        $_SESSION['status'] = 'error';
        header('Location: signup.php');
    }
} else {
    $_SESSION['status'] = 'error';
    header('Location: signup.php');
}
?>