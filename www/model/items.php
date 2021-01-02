<?php

function get_all_items($dbh){
  $sql = '
      SELECT
        id,
        name,
        price,
        stock,
        img,
        status,
        create_datetime,
        update_datetime
      FROM
        items
    ';  
    return fetch_all_query($dbh, $sql);
  }

  function get_active_items($dbh){
    $sql = '
      SELECT
        id,
        name,
        price,
        stock,
        img,
        status,
        create_datetime,
        update_datetime
      FROM
        items
      WHERE status = 1
    ';  
    return fetch_all_query($dbh, $sql);
  }

  function find_item_by_id($dbh, $id){
    $sql = "
    SELECT * FROM items WHERE id = ?
    ";
    return fetch_query($dbh, $sql, array($id));
  }

  function insert_item($dbh, $name, $price, $stock, $filename, $status){
    $status_value = PERMITTED_ITEM_STATUSES[$status];
    $sql = "
      INSERT INTO
        items(
          name,
          price,
          stock,
          img,
          status,
          create_datetime,
          update_datetime
        )
      VALUES(?,?,?,?,?,?,?);
    ";  
    return execute_query($dbh, $sql,array($name, $price, $stock, $filename, $status_value, date("Y/m/d H:i:s"), date("Y/m/d H:i:s")));
  }