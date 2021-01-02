<?php

function find_user($account,$dbh){
        $user = "";
        $sql = "
        SELECT * FROM users WHERE account = ?
        ";
        return fetch_query($dbh, $sql, array($account));
    }