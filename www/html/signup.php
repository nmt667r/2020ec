<?php

require_once '../model/common.php'; 
require_once '../model/user.php'; 

$dbh = get_db_connect();

$err_msg = [];  

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //nullチェック
    $err_msg = check_empty_signup($_POST['account'], $_POST['password'], $_POST['password_confirm'], $_POST['name']);
    //バリデーション
    $err_msg = is_valid_signup($dbh, $err_msg, $_POST['account'], $_POST['password'], $_POST['password_confirm'], $_POST['name']);
    if(count($err_msg) === 0){
        //登録
        insert_user($dbh, $_POST['account'], $_POST['name'], $_POST['password']);
        $login_user = find_user($_POST['account'],$dbh);
        set_session_info($login_user['id'], $login_user['account'], $login_user['name']);        
        //遷移
        header('Location:'. HOME_PATH);
        exit;
    }    
}
include_once '../view/signup_view.php';