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

function get_user_cart($dbh, $user_id){
  $sql = "
  SELECT
    items.id AS item_id,
    items.name,
    items.price,
    items.stock,
    items.status,
    items.img,
    carts.id AS carts_id,
    carts.user_id,
    carts.amount,
    carts.update_datetime
  FROM
    carts
  JOIN
    items
  ON
    carts.item_id = items.id
  WHERE
    carts.user_id = ?
  ";

  return fetch_all_query($dbh, $sql,array($user_id));
}

function delete_user_carts($dbh, $user_id){
    $sql = "
      DELETE FROM
        carts
      WHERE
        user_id = ?
    ";  
  return execute_query($dbh, $sql,array($user_id));
}

function buy_item($dbh, $user_id, $carts){
  $dbh->beginTransaction();
  try{
    delete_user_carts($dbh, $user_id);
    update_each_items_stock($dbh, $carts); 
    $dbh->commit();
  }catch(PDOException $e){
    throw $e; 
  }
}

function update_items_stock($dbh, $item_id, $amount){
  $item = find_item_by_id($dbh, $item_id);
  $stock = $item['stock'] - $amount;
  $sql = "
    UPDATE
      items
    SET
      stock = ?
    WHERE
      id = ?
  ";
  return execute_query($dbh, $sql,array($stock,$item_id));
}

function update_each_items_stock($dbh, $carts){
  foreach($carts as $cart){
    update_items_stock($dbh, $cart['item_id'], $cart['amount']);
  }
}

function delete_cart_item($dbh, $user_id, $item_id){
  $sql = "
    DELETE FROM
      carts
    WHERE
    user_id = ? AND item_id = ?
  ";  
  return execute_query($dbh, $sql,array($user_id, $item_id));
}


