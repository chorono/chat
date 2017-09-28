<?php 
    session_start();
    session_destroy();
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