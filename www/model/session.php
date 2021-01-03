<?php

require_once '../conf/session_name.php';

/**ユーザー情報をセッション変数に格納*/
function set_session_info($user_id, $account, $user_name){
    $_SESSION[SESSION_EC_ID]  = $user_id;
    $_SESSION[SESSION_EC_ACCOUNT] = $account;
    $_SESSION[SESSION_EC_NAME]  = $user_name;
}

