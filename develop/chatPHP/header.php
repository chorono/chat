<div class="content clearfix">
    <div class="nav-left">
        <p><?php 
        session_start();
        echo (isset($_SESSION['account']) ? ($_SESSION['account'].'さんようこそ') : 'ログイン情報無し'); ?></p>
    </div>
    <div class="nav-right">
        <nav>
            <a href="chat.php">チャット</a>
            <a href="login.php">ログイン</a>
            <a href="signup.php">会員登録</a>
            <a href="admin.php">管理画面</a>
            <?php echo (isset($_SESSION['account']) ? '<a href="logout.php">ログアウト</a>' : '')   ?>
        </nav>
    </div>
</div>