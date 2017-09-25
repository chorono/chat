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
                    <h2 class="title">チャット画面</h2>
                </div>
                <?php if(!isset($_SESSION['account'])): ?>
                    <p>ログインをしてください</p>
                    <a href="login.php">ログインはこちらから</a>
                <?php else: ?>
                <div class="chat-wrapper">
                    <div class="chat-body">
                        <?php while ($chattext = $statement->fetch(PDO::FETCH_ASSOC)): ?>
                            <!-- ユーザーが投稿者と同一だったら色を変えて右側に表示 -->
                            <?php $chatPos = ($chattext['account'] === $_SESSION['account']) ? 'right' : 'left'?>
                            <div class="chat-box">
                                <div class="chat-<?=$chatPos?>">
                                    <div class="chat-account">
                                        <p><?php echo h($chattext['account'])?></p>
                                    </div>
                                    <div class="chat-text">
                                        <?php echo $chattext['id']?>
                                        <?php echo nl2br(h($chattext['chattext']))?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile ?>
                    </div>
                    <div class="chat-input">
                        <form method="POST" action="appear.php">
                            <input type="text" name="chattext">
                            <input type="submit" value="送信">
                        </form>
                    </div>
                </div>
            <?php endif ?>
            </div>
        </article>
    </div>
</body>
</html>