<?php
require_once __DIR__ . '/common.php';
session_start();
unset($_SESSION['status']);
if(isset($_POST['login'])) {
    if(inputAuth($_POST['account'],$_POST['password'])) {
        $account = filter_input(INPUT_POST, 'account');
        $password = filter_input(INPUT_POST, 'password');
        $statement = dbConnect()->prepare('SELECT * FROM accounts WHERE account = ?');
        if($statement->execute(array($account))) {
            while ($row = $statement->fetch()){
                if(password_verify($password, $row['pass'])) {
                    $_SESSION['account'] = $account;
                    }else {
                    $_SESSION['status'] = 'error';
                }
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
                <?php if(isset($_SESSION['account'])): ?>
                    <div class="top-wrapper">
                        <h2>チャットへようこそ</h2>
                        <p><a href="chat.php">チャットへ移動</a></p>
                    </div>
                <?php else: ?>
                    <div class="top-wrapper">
                        <h2>ログイン画面</h2>
                    </div>
                    <div class="error">
                        <?php echo ($_SESSION['status'] === 'error' ? 'ログイン失敗' : '') ?>
                        <?php unset($_SESSION['status']) ?>
                    </div>
                    <div class="form-wrapper">
                        <form action="login.php" method="post" accept-charset="utf-8">
                            <table>
                                <tr>
                                    <th><label for="account">ユーザー名</label></th>
                                    <td><input type="text" name="account" minlength="4" maxlength="24" required></td>
                                </tr>
                                <tr>
                                    <th><label for="password">パスワード</label></th>
                                    <td><input type="password" name="password" minlength="4" maxlength="24" required></td>
                                    <td><input type="submit" value="ログイン" name="login"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </article>
    </div>
    
</body>
</html>