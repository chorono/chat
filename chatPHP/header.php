<div class="content clearfix">
    <div class="nav-left">
        <p><?php 
        session_start();
        echo (isset($_SESSION['account']) ? ($_SESSION['account']) : 'ログイン情報無し'); ?></p>
    </div>
    <div class="nav-right">
        <nav>
            <ul>
                <li><a href="chat.php">チャット</a></li>
                <li><a href="login.php">ログイン</a></li>
                <li><a href="signup.php">会員登録</a></li>
                <li><a href="admin.php">管理画面</a></li>
                <?php echo (isset($_SESSION['account']) ? '<li><a href="logout.php">ログアウト</a></li>' : '')   ?>
            </ul>
        </nav>
    </div>
</div>