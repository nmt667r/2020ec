<?php
    
require_once '../conf/const.php';
require_once '../conf/error_messages.php';
require_once '../model/connect_db.php';
require_once '../model/session.php';
get_local_model();

session_start();
$dbh = get_db_connect();

function get_own_informetion(){
    $own_directory = explode('/',$_SERVER['PHP_SELF']);
    $own_file_name = explode('.',$own_directory[count($own_directory)-1]);
    return $own_file_name[0];
}

function get_local_model(){
    $file_name = get_own_informetion();
    if(file_exists('../model/'.$file_name.'.php')){
        require_once '../model/'.$file_name.'.php';
    }
}