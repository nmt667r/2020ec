<?php

    function check_empty_post($name, $password){
        $array_errors = [];
        if(empty($name)){
            $array_errors[] = EMPTY_NAME;
        } else if($name)
        if(empty($password)){
            $array_errors[] = EMPTY_PASSWORD;
        }
        return $array_errors;
    }

    function check_login_user($name, $password, $dbh){        
        $array_errors = [];
        $user = find_user($name,$dbh);
        if(empty($user)){
            $array_errors[] = FAILED_LOGIN;
        } else if($user['password'] !== $password){
            $array_errors[] = FAILED_LOGIN;
        }
        return $array_errors;
    }

    function find_user($name,$dbh){
        $user = "";
        try{
            $sql = 'SELECT * from users where name = ?';
            $stmt = $dbh -> prepare($sql);
            $stmt ->bindValue(1,$name, PDO::PARAM_INT);
            $stmt ->execute();
            $user = $stmt->fetch();                  
        }catch(PDOException $e){
            throw $e;
        }
        return $user;
    }