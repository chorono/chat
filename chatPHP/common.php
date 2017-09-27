<?php
    function dbConnect(){
try {
        $pdo = new PDO('mysql:dbname=sql_chat_1;host=localhost', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
    }catch (Exception $e) {
        exit($e->getMessage());
    }
}

/**
 * htmlspecialcharsのラッパー
 * @param $str
 * @return string
 */
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES);
}

function inputAuth($account,$password) {
    if(!empty($account) && !empty($password)) {
    // ユーザー名チェック
        if(!preg_match('/^[0-9a-zA-Z]{4,24}$/', $account)) {
            $_SESSION['status'] = 'error';
            return FALSE;
        // パスワードチェック
        }elseif(!preg_match('/^[0-9a-zA-Z]{4,24}$/', $password)) {
            $_SESSION['status'] = 'error';
            return FALSE;
        }else {
            return TRUE;
        }
    }else {
        $_SESSION['status'] = 'error';
        return FALSE;
    }
}

function accountAuth($account){
    try {
        $pdo = new PDO('mysql:dbname=sql_chat_1;host=localhost', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (Exception $e) {
        exit($e->getMessage());
    }
    $statement = $pdo->query('SELECT * FROM accounts');
    while($row = $statement->fetch()) {
        if($row['account'] === $account) {
            return TRUE;
        }
    }
    return FALSE;
}