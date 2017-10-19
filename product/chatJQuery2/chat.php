<?php
require_once __DIR__ . '/common.php';
session_start();
$pdo = dbConnect();
$statement = $pdo->query('SELECT * FROM chattexts');
?>
<!DOCTYPE html>
<html>
<head>
    <?php include (dirname(__FILE__).'/htmlCommon/head.php'); ?>
    <meta http-equiv="refresh" content="5" >
</head>
<body>
    <div class="wrapper">
        <header class="clearfix">
            <?php include (dirname(__FILE__).'/htmlCommon/header.php'); ?>
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
                        <!-- ユーザーが投稿者と同一だったら色を変えて右側に表示 -->
                        <?php while ($chattext = $statement->fetch(PDO::FETCH_ASSOC)): ?>
                            <?php $chatPos = ($chattext['account'] === $_SESSION['account']) ? 'right' : 'left'?>
                            <div class="chat-box">
                                <div class="chat-<?=$chatPos?>">
                                    <div class="chat-account">
                                        <p><?php echo h($chattext['account'])?></p>
                                    </div>
                                    <div class="chat-text">
                                        <?php echo nl2br(h($chattext['chattext']))?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile ?>
                    </div>
                    <div class="chat-input">
                        <form method="POST" action="appear.php">
                            <input type="text" name="chattext" class="input-area" maxlength="30" required>
                            <input type="submit" value="送信">
                        </form>
                    </div>
                </div>
            <?php endif ?>
            </div>
        </article>
    </div>
    <script>
        $(function(){
            $('.chat-body').scrollTop($('.chat-body')[0].scrollHeight);
        })
    </script>
</body>
</html>