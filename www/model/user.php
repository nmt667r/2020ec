<?php

function find_user($account,$dbh){
    $sql = "
        SELECT * FROM users WHERE account = ?
    ";
    return fetch_query($dbh, $sql, array($account));
}

function insert_user($dbh, $account, $name, $password){
    $sql = "
      INSERT INTO
        users(
          account,
          name,
          password,
          create_datetime,
          update_datetime
        )
      VALUES(?,?,?,?,?);
    ";  
    return execute_query($dbh, $sql,array($account, $name, $password, date("Y/m/d H:i:s"), date("Y/m/d H:i:s")));
}