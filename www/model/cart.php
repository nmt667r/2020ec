<?php

function stock_check_item($stock, $amount){
  $array_errors = [];
  if($stock < $amount){
    $array_errors[] = NOT_ENOUGH_STOCK; 
  }
  return $array_errors;
}

function find_already_item($dbh, $user_id, $item_id){
    $sql = "
    SELECT * FROM carts WHERE user_id = ? AND item_id = ?
    ";  
    return fetch_query($dbh, $sql, array($user_id, $item_id));
}

function add_cart($dbh, $user_id, $item_id, $amount = 1){
    $sql = "
      INSERT INTO
        carts(
          user_id,
          item_id,
          amount,
          create_datetime,
          update_datetime
        )
      VALUES(?,?,?,?,?);
    ";  
    
    return execute_query($dbh, $sql, array($user_id, $item_id, $amount, date("Y/m/d H:i:s"), date("Y/m/d H:i:s")));
}

function update_cart($dbh, $cart_id, $amount){
    $sql = "
    UPDATE
      carts
    SET
      amount = ?
    WHERE
      id = ?
  ";
  return execute_query($dbh, $sql,array($amount,$cart_id));
}
