<?php
require_once __DIR__ . '/common.php';
try {
    $pdo = new PDO('mysql:dbname=sql_chat_1;host=localhost', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (Exception $e) {
    exit($e->getMessage());
}
$statement = $pdo->query('SELECT * FROM chattexts');
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
                    <h2>チャット管理画面</h2>
                </div>
                <div class="chat-wrapper">
                    <div class="chat-body">
                        <table>
                            <tr>
                                <th>id</th>
                                <th>アカウント</th>
                                <th>コメント</th>
                            </tr>
                            <?php while ($chattext = $statement->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?php echo $chattext['id']?></td>
                                    <td><?php echo h($chattext['account'])?></td>
                                    <td><?php echo nl2br(h($chattext['chattext']))?></td>
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