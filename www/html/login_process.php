<?php
    require_once '../conf/const.php';
    require_once '../conf/error_messages.php';
    require_once '../model/connect_db.php';
    require_once '../model/login.php';   
    $dbh = get_db_connect();

    $err_msg = [];    

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(count($err_msg = check_empty_post($_POST['login_name'], $_POST['login_password'])) === 0){
            if(count($err_msg = check_login_user($_POST['login_name'], $_POST['login_password'], $dbh)) === 0){                
                $login_user = find_user($_POST['login_name'],$dbh);
                header('Location:'. HOME_PATH);
                exit;
            }            
        }
    }
    header('Location:'. LOGIN_PATH);
    exit;
?>