<?php

require_once '../model/common.php'; 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST['action'] ==='insert'){
        insert_item($dbh, $_POST['item_name'], $_POST['price'], $_POST['img'], $_POST['status']);
    }
}

//アイテム全件取得
$items = get_all_items($dbh);

include_once '../view/admin_view.php';