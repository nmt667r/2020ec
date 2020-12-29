<?php

    function check_login($name, $password){
        $array_errors = [];
        if(empty($name)){
            $array_errors[] = EMPTY_NAME;
        } else if($name)
        if(empty($password)){
            $array_errors[] = EMPTY_PASSWORD;
        }
        return $array_errors;
    }