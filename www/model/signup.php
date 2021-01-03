<?php

function check_empty_signup($account, $password, $password_confirm, $name){
    $array_errors = [];
    if(empty($account)){
        $array_errors[] = EMPTY_ACCOUNT;
    }
    if(empty($password)){
        $array_errors[] = EMPTY_PASSWORD;
    }
    if(empty($password_confirm)){
        $array_errors[] = EMPTY_PASSWORD_CONFRIM;
    }
    if(empty($name)){
        $array_errors[] = EMPTY_USER_NAME;
    }
    return $array_errors;
}

function is_valid_signup($dbh, $array_errors, $account, $password, $password_confirm, $name){
    $user = find_user($account,$dbh);
        if(!empty($user)){
            $array_errors[] = ALREADY_SIGN_ACCOUNT;
        } else {
            if(mb_strlen($account) > USER_ACCOUNT_LENGTH_MAX){
                $array_errors[] = OVER_LENGTH_USER_ACCOUNT;
            } else if(mb_strlen($account) < USER_ACCOUNT_LENGTH_MIN){
                $array_errors[] = UNDER_LENGTH_USER_ACCOUNT;
            } else if(preg_match(REGEXP_ALPHANUMERIC, $account) === 0){
                $array_errors[] = ILLEGAL_CHARSET_ACCOUNT;
            }
            if(mb_strlen($password) > USER_PASSWORD_LENGTH_MAX){
                $array_errors[] = OVER_LENGTH_USER_PASSWORD;
            } else if(mb_strlen($password) < USER_PASSWORD_LENGTH_MIN){
                $array_errors[] = UNDER_LENGTH_USER_PASSWORD;
            } else if(preg_match(REGEXP_HALF_ALL, $password) === 0){
                $array_errors[] = ILLEGAL_CHARSET_PASSWORD;
            } else if($password == $password_confirm){
                $array_erros[] = NOT_MATCH_PASSWORD_CONFIRM;
            }
        }        
        return $array_errors;
}