<?php
require_once __DIR__ . '/common.php';
$pdo = dbConnect();
$statement = $pdo->query('SELECT * FROM accounts');
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
                    <h2>アカウント管理画面</h2>
                </div>
                <div class="account-wrapper">
                    <div class="account-body">
                        <table>
                            <tr>
                                <th>id</th>
                                <th>アカウント</th>
                                <th>パスワード</th>
                            </tr>
                            <?php while ($account = $statement->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?php echo $account['id']?></td>
                                    <td><?php echo nl2br(h($account['account']))?></td>
                                    <td><?php echo nl2br(h($account['pass']))?></td>
                                </tr>
                            <?php endwhile ?>
                        </table>
                    </div>
                    <div class="link">
                        <p><a href="admin.php">戻る</a></p>
                    </div>
                </div>
            </div>
        </article>
    </div>
</body>
</html>