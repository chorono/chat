<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
    <?php include (dirname(__FILE__).'/htmlCommon/head.php'); ?>
</head>    

<body>
    <div class="wrapper">
        <header class="clearfix">
            <?php include (dirname(__FILE__).'/htmlCommon/header.php'); ?>
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
                                <td><input type="text" name="account" minlength="4" maxlength="24" required></td>
                            </tr>
                            <tr>
                                <th><label for="password">パスワード</label></th>
                                <td><input type="password" name="password" minlength="4" maxlength="24" required></td>
                                <td><input type="submit" value="登録"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </article>
    </div>
</body>
</html>