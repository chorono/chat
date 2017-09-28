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
                    <h2>管理画面</h2>
                </div>
                <div class="main-wrapper">
                    <p><a href="admin-account.php">アカウント管理</a></p>
                    <p><a href="admin-chat.php">チャット管理</a></p>
                </div>
            </div>
        </article>
    </div>
</body>
</html>