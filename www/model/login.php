<?php

    function check_empty_post($account, $password){
        $array_errors = [];
        if(empty($account)){
            $array_errors[] = EMPTY_ACCOUNT;
        }
        if(empty($password)){
            $array_errors[] = EMPTY_PASSWORD;
        }
        return $array_errors;
    }

    function check_login_user($account, $password, $dbh){        
        $array_errors = [];
        $user = find_user($account,$dbh);
        if(empty($user)){
            $array_errors[] = FAILED_LOGIN;
        } else if($user['password'] !== $password){
            $array_errors[] = FAILED_LOGIN;
        }
        return $array_errors;
    }
    