<?php

require_once '../conf/session_name.php';

/**ユーザー情報をセッション変数に格納*/
function set_session_name($set_value){
    $_SESSION[SESSION_EC_NAME]  = $set_value;
}