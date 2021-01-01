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