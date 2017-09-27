<?php 
    session_start();
    session_destroy();
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
                <div class="top-wrapper">
                    <h2>ログアウト</h2>
                </div>
                <div class="comment-wrapper">
                    <p>ログアウトしました</p>
                </div>
            </div>
        </article>
    </div>
</body>
</html>