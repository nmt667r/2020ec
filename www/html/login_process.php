<?php
    require_once '../conf/const.php';
    require_once '../conf/error_messages.php';
    require_once '../model/login.php';
    $err_msg = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(count($err_msg = check_login($_POST['login_name'], $_POST['login_name'])) === 0){
            header('Location:'. HOME_PATH);
            exit;
        }
    }
    header('Location:'. LOGIN_PATH);
    exit;
?>