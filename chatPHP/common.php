<?php
Class Auth {
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = 'root';
    const DATABASE = 'sql_chat_1';

    private $pdo = null;

    function __construct(){
        try{
            $this->PDO = new PDO(
                self::HOST,
                self::USER,
                self::PASSWORD,
                self::DATABASE
            );
            $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->PDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }catch(Exception $e) {
            exit($e->getMessage());
        }
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
            return 0;
        // パスワードチェック
        }elseif(!preg_match('/^[0-9a-zA-Z]{4,24}$/', $password)) {
            $_SESSION['status'] = 'error';
            return 0;
        }else {
            return 1;
        }
    }else {
        $_SESSION['status'] = 'error';
        return 0;
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
            return 1;
        }
    }
    return 0;
}