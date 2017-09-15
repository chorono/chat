<?php
require_once __DIR__ . '/common.php';
session_start();
if(isset($_POST['login'])) {
    $account = filter_input(INPUT_POST, 'account');;
    $password = filter_input(INPUT_POST, 'password');

    try {
        $pdo = new PDO('mysql:dbname=sql_chat_1;host=127.0.0.1', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (Exception $e) {
        exit($e->getMessage());
    }
    
    $statement = $pdo->prepare('SELECT * FROM accounts WHERE account = ?');
    if($statement->execute(array($account))) {
        while ($row = $statement->fetch()){
            if($password === $row['pass']) {
                $_SESSION['account'] = $account;
                // header('Location: index.php');
            }
        }
    } 
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>チャット</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>    <meta http-equiv="X-UA-Compatible" content="IE=edge">

<body>
    <div class="wrapper">
        <header class="clearfix">
            <?php include (dirname(__FILE__).'/header.php'); ?>
        </header>
        <article>
            <div class="content">
                <?php if(isset($_SESIION['account'])): ?>
                    <div class="top-wrapper">
                        <h2>ようこそ</h2>
                    </div>
                    <div class="form-wrapper">

                    </div>
                <?php else: ?>
                    <div class="top-wrapper">
                        <h2>ログイン画面</h2>
                    </div>
                    <div class="form-wrapper">
                        <form action="login.php" method="post" accept-charset="utf-8">
                            <label for="account">ユーザー名：</label>
                            <input type="text" name="account">
                            <label for="password">パスワード</label>
                            <input type="password" name="password">
                            <input type="submit" value="ログイン" name="login">
                        </form>
                    </div>
                <?php endif ?>
                
            </div>
        </article>
    </div>
    
</body>
</html>