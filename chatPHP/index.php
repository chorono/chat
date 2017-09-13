<?php
require_once __DIR__ . '/common.php';
try {
    $pdo = new PDO('mysql:dbname=sql_chat_1;host=127.0.0.1', 'root', '');
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>チャット</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
    <div class="wrapper">
        <header>
            
        </header>
        <article>
            <div class="content">
                <div class="top-wrapper">
                    <h2 class="title">チャット画面</h2>
                </div>
                <div class="chat-wrapper">
                    <div class="chat-body">
                        <table>
                            <tr>
                                <th>id</th>
                                <th>コメント</th>
                            </tr>
                            <?php while ($chattext = $statement->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?php echo $chattext['id']?></td>
                                    <td><?php echo nl2br(h($chattext['chattext']))?></td>
                                </tr>
                            <?php endwhile ?>
                        </table>
                    </div>
                    <div class="chat-input">
                        <form method="POST" action="appear.php">
                            <input type="text" name="chattext">
                            <input type="submit" value="送信">
                        </form>
                    </div>
                </div>
            </div>
        </article>
    </div>
</body>
</html>