<?php

require_once '../model/common.php'; 
require_once '../model/user.php'; 

$dbh = get_db_connect();

$err_msg = [];    

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(count($err_msg = check_empty_post($_POST['account'], $_POST['login_password'])) === 0){
        if(count($err_msg = check_login_user($_POST['account'], $_POST['login_password'], $dbh)) === 0){                
            $login_user = find_user($_POST['account'],$dbh);
            set_session_info($login_user['id'], $login_user['account'], $login_user['name']);
            header('Location:'. HOME_PATH);
            exit;
        }            
    }
}

require_once '../view/login_view.php';
exit;

?>