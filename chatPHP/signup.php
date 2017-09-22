<?php
session_start()
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
        <header class="clearfix">
            <?php include (dirname(__FILE__).'/header.php'); ?>
        </header>
        <article>
            <div class="content">
                <div class="top-wrapper">
                    <?php if($_SESSION['status'] === 'error'): ?>
                        <p>登録失敗</p>
                        <?php unset($_SESSION['status']) ?>
                    <?php elseif($_SESSION['status'] === 'success'): ?>
                        <p>登録成功</p>
                        <?php unset($_SESSION['status']) ?>
                    <?php endif ?>
                    <h2>会員登録</h2>
                </div>
                <div class="form-wrapper">
                    <form action="register.php" method="POST">
                        <table>
                            <tr>
                                <th><label for="account">ユーザー名</label></th>
                                <td><input type="text" name="account"></td>
                            </tr>
                            <tr>
                                <th><label for="password">パスワード</label></th>
                                <td><input type="password" name="password"></td>
                            </tr>
                        </table>
                        <input type="submit" value="登録">
                    </form>
                </div>
            </div>
        </article>
    </div>
</body>
</html>