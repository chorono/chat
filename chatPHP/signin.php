<?php
session_start();
if(isset($_POST['login'])) {
    $account = $_POST['account'];
    $password = $_POST['password'];

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
            if($password === $row['password']) {
                $SESSION['account'] = $account;
            }
        }
    } 
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>チャット</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <?php echo isset($_SESSION['account']) ? '<p>' + h($_SESSION['account']) + '</p>': '' ?>
        </header>
        <article>
            <div class="content">
                <div class="top-wrapper">
                    <h2>ログイン画面</h2>
                </div>
                <div class="form-wrapper">
                    <form action="signin.php" method="post" accept-charset="utf-8">
                        <label for="account">ユーザー名：</label>
                        <input type="text" name="account">
                        <label for="password">パスワード</label>
                        <input type="password" name="password">
                        <input type="submit" value="ログイン" name="login">
                    </form>
                </div>
            </div>
        </article>
    </div>
    
</body>
</html>