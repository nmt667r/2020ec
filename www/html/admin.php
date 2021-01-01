<?php

require_once '../model/common.php'; 
require_once '../model/items.php'; 
require_once '../model/upload_image.php';

$err_msg = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST['action'] ==='insert'){
        if(empty($err_msg = is_Valid_insert_item($_POST['item_name'], $_POST['price'], $_POST['stock'], $_FILES))){         
            $img_name = upload_image($_FILES);
            insert_item($dbh, $_POST['item_name'], $_POST['price'], $_POST['stock'], $img_name, $_POST['status']);
        }
    }
}

//アイテム全件取得
$items = get_all_items($dbh);

include_once '../view/admin_view.php';